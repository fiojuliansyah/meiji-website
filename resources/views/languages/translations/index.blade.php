@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('translations.update_multiple', ['lang' => app()->getLocale()]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Key</th>
                                <th scope="col">Translation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($translations as $key => $translation)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $translation->key }}</td>
                                <td>
                                    <input type="text" name="translations[{{ $translation->id }}]" class="form-control" value="{{ $translation->translation }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update Translations</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection