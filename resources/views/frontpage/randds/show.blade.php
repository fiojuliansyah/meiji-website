@extends('layouts.front')

@section('title')
{{ $randd->getTranslation('title', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
<br>
<br>
<br>
<div class="randd-section">
    <div class="container">
        <div class="randd-content">
            {!! $randd->getTranslation('content', app()->getLocale()) !!}
        </div>
    </div>
</div>
<br>
<br>
@endsection