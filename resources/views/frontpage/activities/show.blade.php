@extends('layouts.front')

@section('title')
{{ $activity->getTranslation('title', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
<br>
<br>
<br>
<div class="activity-section">
    <div class="container">
        <div class="activity-content">
            {!! $activity->getTranslation('content', app()->getLocale()) !!}
        </div>
    </div>
</div>
<br>
<br>
@endsection