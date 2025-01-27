@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Approval Dashboard') }}</h5>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="approvalTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ translate('Content Type') }}</th>
                                <th>{{ translate('Title / Name') }}</th>
                                <th>{{ translate('Flow') }}</th>
                                <th>{{ translate('Status') }}</th>
                                <th>{{ translate('Detail Content') }}</th>
                                <th>{{ translate('Approval') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $content)
                                <tr>
                                    <td>{{ class_basename($content) }}</td>
                                    <td>
                                        {{ 
                                            (is_array($content->title) ? $content->title['en'] ?? '' : $content->title) 
                                            . 
                                            (is_array($content->name) ? '' . ($content->name['en'] ?? '') : '' . $content->name) 
                                        }}                        
                                    </td>
                                    <td>
                                        @foreach ($content->requiredApprovals as $requirement)
                                            <div>
                                                {{ $requirement->approvalType->name }}
                                                @php
                                                    $approval = $content->approvals->firstWhere('approval_type_id', $requirement->approval_type_id);
                                                @endphp
                                    
                                                @if ($approval)
                                                    @if ($approval->status === 'approved')
                                                        <span class="badge bg-success">{{ translate('Approved') }}</span>
                                                    @elseif ($approval->status === 'rejected')
                                                        <span class="badge bg-danger">{{ translate('Rejected') }}</span>
                                                        <p class="text-muted mt-1"><small>{{ $approval->rejection_description }}</small></p>
                                                    @endif
                                                @else
                                                    <span class="badge bg-warning">{{ translate('Pending') }}</span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </td>                                                                    
                                    <td>
                                        @if ($content->approvals->contains('status', 'rejected'))
                                            <span class="badge bg-danger">{{ translate('Rejected') }}</span>
                                        @elseif ($content->isFullyApproved())
                                            <span class="badge bg-success">{{ translate('Published') }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ translate('Pending Approval') }}</span>
                                        @endif
                                    </td>                                    
                                    <td>
                                        <a href="{{ route('approvals.show', ['approvableType' => class_basename($content), 'approvableId' => $content->id]) }}" class="btn btn-info btn-sm">
                                            {{ translate('View Details') }}
                                        </a>
                                    </td>                                    
                                    <td>
                                        @foreach ($content->requiredApprovals as $requirement)
                                            @if (!$content->approvals->contains('approval_type_id', $requirement->approval_type_id) && $requirement->approvalType->user_id === auth()->id())
                                                <!-- Approve Button -->
                                                <form action="{{ route('approve', ['approvableType' => get_class($content), 'approvableId' => $content->id, 'approvalTypeId' => $requirement->approval_type_id]) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        {{ translate('Approve') }}
                                                    </button>
                                                </form>
                                    
                                                <!-- Reject Button -->
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $requirement->approval_type_id }}">
                                                    {{ translate('Reject') }}
                                                </button>
                                            @endif
                                        @endforeach
                                    </td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
    @foreach ($content->requiredApprovals as $requirement)
        @if (!$content->approvals->contains('approval_type_id', $requirement->approval_type_id) && $requirement->approvalType->user_id === auth()->id())->
            <!-- Reject Modal -->
            <div class="modal fade" id="rejectModal-{{ $requirement->approval_type_id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rejectModalLabel">{{ translate('Reject Approval') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('reject', [
                            'approvableType' => get_class($content), 
                            'approvableId' => $content->id, 
                            'approvalTypeId' => $requirement->approval_type_id
                        ]) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="rejection_description" class="form-label">{{ translate('Reason for Rejection') }}</label>
                                    <textarea name="rejection_description" id="rejection_description" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ translate('Close') }}</button>
                                <button type="submit" class="btn btn-danger">{{ translate('Reject') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection