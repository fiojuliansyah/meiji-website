@extends('layouts.front')

@section('title', 'Contact - Meiji Indonesia')

@section('content')
<section class="map map-2"> 
  {!! $contact->map_url !!}
</section>
<section class="contact-info"> 
    <div class="container"> 
      <div class="row">
        <div class="contact-panel contact-panel-4">
            <div class="contact-card">
              <div class="contact-body">
                <h5 class="card-heading">{{ $contact->getTranslation('title', app()->getLocale()) }}</h5>
                <p class="card-desc">{!! $contact->getTranslation('content', app()->getLocale()) !!}</p>
                <form class="contactForm" method="post" action="assets/php/contact.php">
                  <div class="row">
                    <div class="col-12 col-md-12 col-lg-6">
                      <input class="form-control" type="text" name="contact-name" placeholder="Name" required=""/>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                      <input class="form-control" type="text" name="contact-email" placeholder="Email" required=""/>
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="text" name="subject" placeholder="Subject" required=""/>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                      <input class="form-control" type="text" name="contact-phone" placeholder="Phone" required=""/>
                    </div>
                    <div class="col-12"> 
                      <textarea class="form-control" name="contact-message" cols="30" rows="2" placeholder="message" required=""></textarea>
                    </div>
                    <div class="col-12">
                      <button class="btn btn--secondary btn-line btn-line-before btn--block"><span class="line"> <span> </span></span><span>submit request</span></button>
                    </div>
                    <div class="col-12">
                      <div class="contact-result"></div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- End .contact-body-->
            </div>
        </div>
        <!-- End .contact-panel-->
      </div>
    </div>
  </section>
@endsection
