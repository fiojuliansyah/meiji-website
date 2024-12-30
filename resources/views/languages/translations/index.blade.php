@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('translations.update_multiple', ['lang' => app()->getLocale()]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Translations Table -->
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Key</th>
                                <th scope="col">Translation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($translations as $index => $translation)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $translation->key }}</td>
                                <td>
                                    <!-- Input field for updating translation -->
                                    <input type="text" 
                                           name="translations[{{ $translation->id }}]" 
                                           class="form-control" 
                                           value="{{ old('translations.' . $translation->id, $translation->translation) }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Submit Button -->
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update Translations</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
