@extends('layouts.front')

@section('title')
{{ translate('History') }} - Meiji Indonesia
@endsection

@section('content')
<section class="page-title bg-overlay bg-overlay-dark bg-parallax" id="page-title">
    <div class="bg-section">
        <img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="Background"/>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
                <div class="title">
                    <div class="title-heading">
                        <h1>{{ translate('Company History') }}</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ translate('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ translate('Company History') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="timeline-container" style="width: 100%; padding: 40px 0;">
                <div class="timeline-wrapper">
                    <!-- Timeline Line -->
                    <div class="timeline-line"></div>

                    <!-- Timeline Events -->
                    <div class="timeline-events">
                        @foreach($timelines as $timeline)
                        <div class="timeline-event">
                            <!-- Year Bubble -->
                            <div class="timeline-year">
                                <span>{{ $timeline->year }}</span>
                            </div>

                            <!-- Content Box -->
                            <div class="timeline-content">
                                <!-- Image -->
                                <div class="timeline-image">
                                    <img src="{{ asset('storage/' . $timeline->image) }}" alt="{{ $timeline->getTranslation('title', app()->getLocale()) }}">
                                </div>

                                <!-- Text Content -->
                                <h3>{{ $timeline->getTranslation('title', app()->getLocale()) }}</h3>
                                <p>{{ $timeline->getTranslation('content', app()->getLocale()) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Scroll Hint -->
                <div class="timeline-hint">
                    <p>{{ translate('Scroll horizontally to view more') }} →</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Wrapper */
.timeline-wrapper {
    position: relative;
    overflow-x: auto;
    padding: 40px 0;
    scroll-behavior: smooth;
}

/* Timeline Line */
.timeline-line {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 4px;
    background: #e0e0e0;
    transform: translateY(-50%);
    z-index: 0;
}

/* Events */
.timeline-events {
    display: flex;
    gap: 20px;
    position: relative;
    padding: 0 20px;
}

/* Event Card */
.timeline-event {
    flex: 0 0 300px;
    position: relative;
    z-index: 1;
    transition: transform 0.3s ease;
}
.timeline-event:hover {
    transform: translateY(-5px);
}

/* Year Bubble */
.timeline-year {
    width: 60px;
    height: 60px;
    background: #fff;
    border: 4px solid #ff0000;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
}
.timeline-year span {
    font-weight: bold;
    color: #ff0000;
}

/* Content */
.timeline-content {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.timeline-content h3 {
    font-size: 1.2rem;
    color: #283b6a;
    margin-bottom: 10px;
}
.timeline-content p {
    font-size: 0.9rem;
    color: #666;
    line-height: 1.5;
}

/* Image */
.timeline-image {
    width: 100%;
    height: 150px;
    margin-bottom: 15px;
    overflow: hidden;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f5f5f5;
}
.timeline-image img {
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

/* Scrollbar */
.timeline-wrapper::-webkit-scrollbar {
    height: 8px;
}
.timeline-wrapper::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}
.timeline-wrapper::-webkit-scrollbar-thumb {
    background: #ff0000;
    border-radius: 4px;
}
.timeline-wrapper::-webkit-scrollbar-thumb:hover {
    background: #ff0000;
}

/* Scroll Hint */
.timeline-hint {
    text-align: center;
    margin-top: 20px;
    color: #666;
}
.timeline-hint p {
    font-size: 0.9rem;
}

/* Responsive */
@media (max-width: 768px) {
    .timeline-event {
        flex: 0 0 250px;
    }
}
</style>
@endsection
