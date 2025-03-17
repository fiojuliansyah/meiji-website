@extends('layouts.front')

@section('title')
{{ $activity->getTranslation('title', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
{{-- <section class="page-title bg-overlay bg-overlay-dark bg-parallax" id="page-title">
    <div class="bg-section"><img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="Background"/></div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <div class="title">
            <div class="title-heading">
              <h1>{{ $activity->getTranslation('title', app()->getLocale()) }}</h1>
            </div>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">{{ translate('Home') }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $activity->getTranslation('title', app()->getLocale()) }}</li>
            </ol>
          </div>
          <!-- End .title -->
        </div>
        <!-- End .col-lg-6-->
      </div>
      <!-- End .row-->
    </div>
    <!-- End .container-->
  </section>
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
<br> --}}
<section class="single-service single-department">
  <div class="container">
    <div class="row"> 
      <div class="col-12 col-lg-8"> 
        <div class="entry-infos entry-infos-2">
          {!! $activity->getTranslation('content', app()->getLocale()) !!}
        </div>
        {{-- <div class="entry-contact"> 
          <div class="contact-panel bg-overlay bg-overlay-theme3">
            <div class="bg-section"> <img src="assets/images/sliders/1.jpg" alt="background"/></div>
            <div class="contact-card">
              <div class="contact-body">
                <h5 class="card-heading">book an appointment</h5>
                <p class="card-desc">Please feel welcome to contact our staff with any general or medical enquiry. Our doctors will receive or return any urgent calls.</p>
                <form class="contactForm" method="post" action="assets/php/contact.php">
                  <div class="row">
                    <div class="col-12 col-md-12 col-lg-6">
                      <input class="form-control" type="text" name="contact-name" placeholder="Name" required=""/>
                      <div class="badge">Name</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                      <input class="form-control" type="text" name="contact-email" placeholder="Email" required=""/>
                      <div class="badge">Email</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="select-holder">
                       <input type="text" class="form-control" placeholder="Subject">
                        <div class="badge">Subject</div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <input class="form-control" type="text" name="contact-phone" placeholder="Phone" required=""/>
                      <div class="badge">Phone</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn--secondary btn-line btn-line-before btn--block"><span class="line"> <span> </span></span><span>make appointment</span></button>
                    </div>
                    <div class="col-12">
                      <div class="contact-result"></div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- End .contact-body -->
            </div>
          </div>
          <!-- End .contact-panel-->
        </div> --}}
      </div>
      <div class="col-12 col-lg-4"> 
        <!-- 
        ============================
        Sidebar Department
        ============================
        -->
        <div class="sidebar sidebar-service sidebar-department">
          <!-- Services-->
          <div class="widget widget-services">
            <div class="widget-title">
              <h5>Other Activities</h5>
            </div>
            <div class="widget-content">
              <ul class="list-unstyled">
                @foreach ($activities as $item)   
                  @if ($item->id != $activity->id)  
                    <li><a href="{{ route('frontpage.activity.show', ['lang' => app()->getLocale(), 'slug' => $item->getTranslation('slug', app()->getLocale())]) }}"> <span class="line"> <span></span></span><span>{{ $item->getTranslation('title', app()->getLocale()) }}</span></a></li>
                  @endif
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <!-- End .sidebar-->
      </div>
    </div>
  </div>
</section>
@endsection