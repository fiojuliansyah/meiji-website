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
                                <th>{{ translate('Action') }}</th>
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
                                                <p>{{ $requirement->approvalType->user->name }} 
                                                    <small>({{ $requirement->approvalType->name }}) </small>
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
                                                </p>
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
                                        @foreach ($content->requiredApprovals as $requirement)
                                            @if (!$content->approvals->contains('approval_type_id', $requirement->approval_type_id) && $requirement->approvalType->user_id === auth()->id())
                                                @if ($requirement->approvalType->is_preview !== null)
                                                    <a href="{{ route('approvals.show', ['approvableType' => class_basename($content), 'approvableId' => $content->id]) }}" class="btn btn-info btn-sm" target="_blank">
                                                        {{ translate('Preview') }}
                                                    </a>
                                                @endif
                                                <br>    
                                                @if ($requirement->approvalType->is_edit !== null)
                                                    <a href="{{ route('approvals.edit', ['approvableType' => class_basename($content), 'approvableId' => $content->id]) }}" class="btn btn-warning btn-sm" target="_blank">
                                                        {{ translate('Edit Content') }}
                                                    </a>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>                                    
                                    <td>
                                        @foreach ($content->requiredApprovals as $requirement)
                                            @if (!$content->approvals->contains('approval_type_id', $requirement->approval_type_id) && $requirement->approvalType->user_id === auth()->id())
                                                <!-- Approve Button -->
                                                <a class="btn btn-success btn-sm"  onclick="event.preventDefault();
                                                    document.getElementById('approve-btn').submit();">
                                                    {{ translate('Approve') }}
                                                </a>
                                                <form id="approve-btn" action="{{ route('approve', ['approvableType' => get_class($content), 'approvableId' => $content->id, 'approvalTypeId' => $requirement->approval_type_id]) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                </form>
                                    
                                                <!-- Reject Button -->
                                                <br>
                                                <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $requirement->approval_type_id }}">
                                                    {{ translate('Reject') }}
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>

                                    <!-- Rollback Button -->
                                    @if ($content->approvals->contains('status', 'approved'))
                                    <td>
                                        <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#rollbackModal-{{ $content->id }}">
                                            {{ translate('Rollback') }}
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <p>Waiting For Rollback</p>
                                    </td>
                                    @endif                                    
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
    <!-- Modal for Rollback Confirmation -->
    @foreach ($contents as $content)
        @if ($content->approvals->contains('status', 'approved'))
        <div class="modal fade" id="rollbackModal-{{ $content->id }}" tabindex="-1" aria-labelledby="rollbackModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rollbackModalLabel">{{ translate('Rollback Approval') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ translate('Are you sure you want to rollback the approval for this content?') }}
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('rollback', ['approvableType' => get_class($content), 'approvableId' => $content->id, 'approvalTypeId' => $requirement->approval_type_id]) }}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ translate('Cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ translate('Rollback') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach

    <!-- Modal for Reject Confirmation -->
    @foreach ($contents as $content)
        @foreach ($content->requiredApprovals as $requirement)
            @if (!$content->approvals->contains('approval_type_id', $requirement->approval_type_id) && $requirement->approvalType->user_id === auth()->id())
            <div class="modal fade" id="rejectModal-{{ $requirement->approval_type_id }}" tabindex="-1" aria-labelledby="rejectModalLabel-{{ $requirement->approval_type_id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rejectModalLabel-{{ $requirement->approval_type_id }}">{{ translate('Reject Approval') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('approve.reject', ['approvableType' => class_basename($content), 'approvableId' => $content->id, 'approvalTypeId' => $requirement->approval_type_id]) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="rejection_description" class="form-label">{{ translate('Rejection Reason') }}</label>
                                    <textarea class="form-control" id="rejection_description" name="rejection_description" rows="3" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ translate('Cancel') }}</button>
                                    <button type="submit" class="btn btn-danger">{{ translate('Reject') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    @endforeach
@endsection