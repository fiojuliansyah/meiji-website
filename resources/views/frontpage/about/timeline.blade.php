@extends('layouts.front')

@section('title')
{{ translate('History') }} - Meiji Indonesia
@endsection

@section('content')
<div class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="timeline-container" style="width: 100%; padding: 40px 0;">
                <!-- Timeline Header -->
                <div style="text-align: center; margin-bottom: 50px;">
                    <h2 style="font-size: 2.5rem; color: #283b6a; margin-bottom: 20px;">{{ translate('Our History') }}</h2>
                    <p style="color: #666; font-size: 1.1rem;">{{ translate('Journey of Excellence and Innovation') }}</p>
                </div>

                <!-- Timeline Wrapper -->
                <div class="timeline-wrapper" style="position: relative; overflow-x: auto; padding: 40px 0;">
                    <!-- Timeline Line -->
                    <div style="position: absolute; width: 100%; height: 4px; background: #e0e0e0; top: 50%; transform: translateY(-50%);"></div>
                    
                    <!-- Timeline Events -->
                    <div style="display: flex; position: relative; min-width: max-content; padding: 0 20px;">
                        @foreach($timelines as $timeline)
                        <div class="timeline-event" style="flex: 0 0 300px; padding: 0 20px; position: relative;">
                            <!-- Year Bubble -->
                            <div style="width: 60px; height: 60px; background: #fff; border: 4px solid #ff0000; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; position: relative; z-index: 1; background-color: white;">
                                <span style="font-weight: bold; color: #ff0000;">{{ $timeline->year }}</span>
                            </div>
                            
                            <!-- Content Box -->
                            <div style="background: white; border-radius: 8px; padding: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-top: 20px;">
                                <!-- Image -->
                                <div style="width: 100%; height: 150px; margin-bottom: 15px; overflow: hidden; border-radius: 4px;">
                                    <img src="{{ asset('storage/' . $timeline->image) }}" alt="{{ $timeline->getTranslation('title', app()->getLocale()) }}" 
                                         style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                
                                <!-- Text Content -->
                                <h3 style="font-size: 1.2rem; color: #283b6a; margin-bottom: 10px;">
                                    {{ $timeline->getTranslation('title', app()->getLocale()) }}
                                </h3>
                                <p style="font-size: 0.9rem; color: #666; line-height: 1.5;">
                                    {{ $timeline->getTranslation('content', app()->getLocale()) }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Scroll Hint -->
                <div style="text-align: center; margin-top: 20px; color: #666;">
                    <p style="font-size: 0.9rem;">{{ translate('Scroll horizontally to view more') }} →</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom Scrollbar */
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

/* Smooth Scroll Behavior */
.timeline-wrapper {
    scroll-behavior: smooth;
}

/* Hover Effects */
.timeline-event:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}

/* Responsive Design */
@media (max-width: 768px) {
    .timeline-event {
        flex: 0 0 250px !important;
    }
}
</style>
@endsection