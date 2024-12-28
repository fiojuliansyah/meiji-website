@extends('layouts.front')

@section('title')
{{ $about->getTranslation('title', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
<br>
<br>
<br>
<div class="about-section">
    <div class="container">
        <div class="about-content">
            {!! $about->getTranslation('content', app()->getLocale()) !!}
        </div>
    </div>
</div>
<br>
<br>
@endsection