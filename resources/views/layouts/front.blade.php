<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="author" content="Ayman Fikry"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Medisch Responsive Bootstrap 4 Medical HTML5 Template"/>
    <title>@yield('title') - PT Meiji Indonesia</title>
    @if ($general && $general->favicon)
      <link rel="icon" href="{{ asset('storage/' . $general->favicon) }}" type="image/png" />
    @endif
    <!--  Fonts ==
    -->
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&amp;family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet"/>
    <!--  Stylesheets==
    -->
    <link href="/front/assets/css/vendor.min.css" rel="stylesheet"/>
    <link href="/front/assets/css/style.css" rel="stylesheet"/>
  </head>
  <body>
    <div class="preloader">
      <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
    <div class="cursor">
      <div class="cursor__inner cursor__inner--circle"></div>
      <div class="cursor__inner cursor__inner--dot"></div>
    </div>
    <!-- End .cursor-->
    <!-- Document Wrapper-->
    <div class="wrapper clearfix" id="wrapperParallax">
      @include('layouts.partials_front.header')
     
      @yield('content')
      {{-- <section class="features bg-overlay bg-overlay-theme" id="features-1">
        <div class="bg-section"> <img src="/front/assets/images/background/1.jpg" alt="Background"/></div>
        <div class="container">
          <div class="heading heading-3 heading-light">
            <div class="row">
              <div class="col-12 col-lg-5">
                <h2 class="heading-title">Sets The Standard For High Quality Care And Patient Safety!!</h2>
              </div>
              <div class="col-12 col-lg-6 offset-lg-1">
                <p class="paragraph">Our doctors include highly qualified male and female practitioners who come from a range of backgrounds and bring a diversity of skills. Our administration and support staff all have exceptional people skills.</p>
                <p class="heading-desc">Our administration and support staff all have exceptional people skills and trained to assist you with all medical enquiries.</p>
                <div class="actions-holder"><a class="btn btn--transparent btn--inversed btn-line btn-line-after" href="page-faqs.html"> <span>our core values</span><span class="line"> <span></span></span></a><a class="btn btn--white" href="page-about.html">more about us</a></div>
              </div>
            </div>
            <!-- End .row-->
          </div>
          <!-- End .heading-->
          <div class="features-holder">
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-007-stethoscope"></i></div>
                  <div class="feature-content">
                    <h4>Medical Advices &amp; Check Ups</h4>
                    <p>Consult our doctors any time.</p>
                  </div><a href="javascript:void(0)"><i class="fas fa-angle-down"></i> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-026-education"></i></div>
                  <div class="feature-content">
                    <h4>Trusted Medical Treatment</h4>
                    <p>Free coverage adults with limited income.</p>
                  </div><a href="javascript:void(0)"><i class="fas fa-angle-down"></i> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-036-aid"></i></div>
                  <div class="feature-content">
                    <h4>Emergency Help Available</h4>
                    <p>Contact our reception staff any time.</p>
                  </div><a href="javascript:void(0)"><i class="fas fa-angle-down"></i> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-032-medicine"></i></div>
                  <div class="feature-content">
                    <h4>Medical Research</h4>
                    <p>Provide all medical aspects practice</p>
                  </div><a href="javascript:void(0)"><i class="fas fa-angle-down"></i> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-046-blood-pressure"></i></div>
                  <div class="feature-content">
                    <h4>Only Qualified Doctors</h4>
                    <p>Qualified doctors available 24/7</p>
                  </div><a href="javascript:void(0)"><i class="fas fa-angle-down"></i> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
          </div>
          <!-- End .features-holder-->
          <div class="more-features"> 
            <p>Connecting with the world to improve health globally. <a href="#">explore our doctors </a></p>
          </div>
        </div>
        <!-- End .container-->
      </section>
      <section class="services services-2" id="services-2">
        <div class="bg-section"><img src="/front/assets/images/background/pattern.png" alt="background"/></div>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
              <div class="heading heading-7 text--center">
                <p class="heading-subtitle">The Best Medical And General Practice Care!</p>
                <h2 class="heading-title">Providing Medical Care For The Sickest In Community.</h2>
              </div>
            </div>
            <!-- End .col-lg-6-->
          </div>
          <!-- End .row-->
          <div class="row">
            <div class=" col-12 col-md-6 col-lg-4">
              <div class="service-panel service-panel-2" data-hover="">
                <div class="service-panel-holder">
                  <div class="service-content"> 
                    <div class="service-icon"> <i class="flaticon-046-blood-pressure"></i></div>
                    <div class="service-title">
                      <h4><a href="#">Neurology Clinic</a></h4>
                    </div>
                    <div class="service-desc">
                      <p>Some neurologists receive subspecialty training focusing on a particular area of the fields, these training programs called fellowships, and one to two years.</p>
                    </div>
                    <div class="service-more"><a class="btn btn--white btn-line btn-line-before btn-line-inversed" href="page-our-services.html"> <span class="line"> <span></span></span><span>read more</span></a></div>
                  </div>
                  <!-- End .service-content -->
                </div>
                <!-- End .service-item-holder-->
              </div>
            </div>
            <div class=" col-12 col-md-6 col-lg-4">
              <div class="service-panel service-panel-2" data-hover="">
                <div class="service-panel-holder">
                  <div class="service-content"> 
                    <div class="service-icon"> <i class="flaticon-029-cardiogram-1"></i></div>
                    <div class="service-title">
                      <h4><a href="#">Cardiology Clinic</a></h4>
                    </div>
                    <div class="service-desc">
                      <p>All cardiologists study the disorders of the heart, but the study of adult and child heart disorders are trained to take care of small children...</p>
                    </div>
                    <div class="service-more"><a class="btn btn--white btn-line btn-line-before btn-line-inversed" href="page-our-services.html"> <span class="line"> <span></span></span><span>read more</span></a></div>
                  </div>
                  <!-- End .service-content -->
                </div>
                <!-- End .service-item-holder-->
              </div>
            </div>
            <div class=" col-12 col-md-6 col-lg-4">
              <div class="service-panel service-panel-2" data-hover="">
                <div class="service-panel-holder">
                  <div class="service-content"> 
                    <div class="service-icon"> <i class="flaticon-018-medical-2"></i></div>
                    <div class="service-title">
                      <h4><a href="#">Pathology Clinic</a></h4>
                    </div>
                    <div class="service-desc">
                      <p>Pathology is the study of disease, it is the bridge between science and medicine. Also it underpins every aspect of patient care, from diagnostic testing...</p>
                    </div>
                    <div class="service-more"><a class="btn btn--white btn-line btn-line-before btn-line-inversed" href="page-our-services.html"> <span class="line"> <span></span></span><span>read more</span></a></div>
                  </div>
                  <!-- End .service-content -->
                </div>
                <!-- End .service-item-holder-->
              </div>
            </div>
          </div>
          <!-- End .row-->
          <div class="row"> 
            <div class="col-12"> 
              <div class="more-services">
                <p>Delivering tomorrow’s health care for your family. <a href="doctors-timetable.html">view doctors' timetable </a></p>
              </div>
            </div>
          </div>
        </div>
        <!-- End .container-->
      </section>
      <section class="team team-standard team-carousel" id="teamCarousel-2">
        <div class="container"> 
          <div class="row"> 
            <div class="col-12 col-lg-5"> 
              <div class="heading heading-5">
                <h2 class="heading-title">meet our doctors</h2>
                <p class="heading-desc">Our administration and support staff  have exceptional skills and trained to assist you with all enquiries.</p>
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-12"> 
              <div class="carousel owl-carousel carousel-navs" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="true" data-dots="false" data-space="30" data-loop="true" data-speed="3000">
                              <div>
                                <div class="team-member" data-hover="">
                                  <div class="team-member-holder">
                                    <div class="team-img"><a class="link" href="doctors-standard.html"></a><img src="/front/assets/images/team/grid/1.jpg" alt="team member"/>
                                      <div class="team-social"> <a href="javascript:void(0)"><i class="fab fa-facebook-f"> </i></a><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a><a href="javascript:void(0)"><i class="fas fa-envelope"></i></a><a href="javascript:void(0)"><i class="fas fa-phone-alt"></i></a></div>
                                    </div>
                                    <!-- End .team-img-->
                                    <div class="team-content"> 
                                      <div class="team-title">
                                        <h4><a href="doctors-standard.html">Richard Muldoone</a></h4>
                                      </div>
                                      <div class="team-cat"><a href="javascript:void(0)">Cardiology Specialist</a></div>
                                      <div class="team-desc">
                                        <p>Muldoone obtained his undergraduate degree in Biomedical Engineering at Tulane University prior to attending St George University School of Medicine.</p>
                                      </div>
                                    </div>
                                    <!-- End .team-content -->
                                  </div>
                                </div>
                              </div>
                              <div>
                                <div class="team-member" data-hover="">
                                  <div class="team-member-holder">
                                    <div class="team-img"><a class="link" href="doctors-standard.html"></a><img src="/front/assets/images/team/grid/2.jpg" alt="team member"/>
                                      <div class="team-social"> <a href="javascript:void(0)"><i class="fab fa-facebook-f"> </i></a><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a><a href="javascript:void(0)"><i class="fas fa-envelope"></i></a><a href="javascript:void(0)"><i class="fas fa-phone-alt"></i></a></div>
                                    </div>
                                    <!-- End .team-img-->
                                    <div class="team-content"> 
                                      <div class="team-title">
                                        <h4><a href="doctors-standard.html">Michael Brian</a></h4>
                                      </div>
                                      <div class="team-cat"><a href="javascript:void(0)">Dermatologists</a></div>
                                      <div class="team-desc">
                                        <p>Brian specializes in treating skin, hair, nail, and mucous membrane. He also address cosmetic issues, helping to revitalize the skin, hair, and...</p>
                                      </div>
                                    </div>
                                    <!-- End .team-content -->
                                  </div>
                                </div>
                              </div>
                              <div>
                                <div class="team-member" data-hover="">
                                  <div class="team-member-holder">
                                    <div class="team-img"><a class="link" href="doctors-standard.html"></a><img src="/front/assets/images/team/grid/3.jpg" alt="team member"/>
                                      <div class="team-social"> <a href="javascript:void(0)"><i class="fab fa-facebook-f"> </i></a><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a><a href="javascript:void(0)"><i class="fas fa-envelope"></i></a><a href="javascript:void(0)"><i class="fas fa-phone-alt"></i></a></div>
                                    </div>
                                    <!-- End .team-img-->
                                    <div class="team-content"> 
                                      <div class="team-title">
                                        <h4><a href="doctors-standard.html">Maria Andaloro</a></h4>
                                      </div>
                                      <div class="team-cat"><a href="javascript:void(0)">Pediatrician</a></div>
                                      <div class="team-desc">
                                        <p>Andaloro graduated from medical school and completed 3 years residency program in pediatrics. She passed by the American Board of Pediatrics.</p>
                                      </div>
                                    </div>
                                    <!-- End .team-content -->
                                  </div>
                                </div>
                              </div>
                              <div>
                                <div class="team-member" data-hover="">
                                  <div class="team-member-holder">
                                    <div class="team-img"><a class="link" href="doctors-standard.html"></a><img src="/front/assets/images/team/grid/4.jpg" alt="team member"/>
                                      <div class="team-social"> <a href="javascript:void(0)"><i class="fab fa-facebook-f"> </i></a><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a><a href="javascript:void(0)"><i class="fas fa-envelope"></i></a><a href="javascript:void(0)"><i class="fas fa-phone-alt"></i></a></div>
                                    </div>
                                    <!-- End .team-img-->
                                    <div class="team-content"> 
                                      <div class="team-title">
                                        <h4><a href="doctors-standard.html">Dupree Black</a></h4>
                                      </div>
                                      <div class="team-cat"><a href="javascript:void(0)">Urologist</a></div>
                                      <div class="team-desc">
                                        <p>Black diagnose and treat diseases of the urinary tract in both men and women. He also diagnose and treat anything involving...</p>
                                      </div>
                                    </div>
                                    <!-- End .team-content -->
                                  </div>
                                </div>
                              </div>
                              <div>
                                <div class="team-member" data-hover="">
                                  <div class="team-member-holder">
                                    <div class="team-img"><a class="link" href="doctors-standard.html"></a><img src="/front/assets/images/team/grid/5.jpg" alt="team member"/>
                                      <div class="team-social"> <a href="javascript:void(0)"><i class="fab fa-facebook-f"> </i></a><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a><a href="javascript:void(0)"><i class="fas fa-envelope"></i></a><a href="javascript:void(0)"><i class="fas fa-phone-alt"></i></a></div>
                                    </div>
                                    <!-- End .team-img-->
                                    <div class="team-content"> 
                                      <div class="team-title">
                                        <h4><a href="doctors-standard.html">Markus Skar</a></h4>
                                      </div>
                                      <div class="team-cat"><a href="javascript:void(0)">laboratory</a></div>
                                      <div class="team-desc">
                                        <p>Skar play a very important role in your health care. People working in the clinical laboratory are responsible for conducting tests.</p>
                                      </div>
                                    </div>
                                    <!-- End .team-content -->
                                  </div>
                                </div>
                              </div>
                              <div>
                                <div class="team-member" data-hover="">
                                  <div class="team-member-holder">
                                    <div class="team-img"><a class="link" href="doctors-standard.html"></a><img src="/front/assets/images/team/grid/6.jpg" alt="team member"/>
                                      <div class="team-social"> <a href="javascript:void(0)"><i class="fab fa-facebook-f"> </i></a><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a><a href="javascript:void(0)"><i class="fas fa-envelope"></i></a><a href="javascript:void(0)"><i class="fas fa-phone-alt"></i></a></div>
                                    </div>
                                    <!-- End .team-img-->
                                    <div class="team-content"> 
                                      <div class="team-title">
                                        <h4><a href="doctors-standard.html">Kiano Barker</a></h4>
                                      </div>
                                      <div class="team-cat"><a href="javascript:void(0)">Pathologist</a></div>
                                      <div class="team-desc">
                                        <p>Barker help care for patients every day by providing their doctors with the information needed to ensure appropriate care.</p>
                                      </div>
                                    </div>
                                    <!-- End .team-content -->
                                  </div>
                                </div>
                              </div>
              </div>
            </div>
            <div class="col-12"> 
              <div class="action-bar">
                <p class="note"><span><i class="fas fa-calendar-day"></i> on monday, </span> Doctors will be available from 8 am : 12 am , kindly call to confirm your Appointment </p><a class="btn btn--primary btn-line btn-line-after" href="page-appointments.html"><span>make appointment</span><span class="line"><span></span></span></a>
              </div>
            </div>
          </div>
          <!-- End .row -->
        </div>
        <!-- End .container-->
      </section>
      <section class="donations" id="donations-1">
        <div class="container">
          <div class="heading heading-4">
            <div class="row">
              <div class="col-12 col-lg-5">
                <h2 class="heading-title">Helping Patients From Around the Globe!!</h2>
                <div class="img-hotspot"> 
                  <div class="img-hotspot-wrap">
                    <div class="img-hotspot-bg"> <img src="/front/assets/images/background/world-map.png" alt="image"/></div>
                    <div class="img-hotspot-pointers">
                      <div class="img-hotspot-pointer" data-spot-x="15%" data-spot-y="29%"><img src="/front/assets/images/background/map-pointer.png" alt="pointer"/>
                        <div class="info right" data-info-x="18px" data-info-y="-97px"><span>2307 Beverley Rd Brooklyn, New York 11226 U.S.</span></div>
                      </div>
                      <div class="img-hotspot-pointer" data-spot-x="48%" data-spot-y="48%"><img src="/front/assets/images/background/map-pointer.png" alt="pointer"/>
                        <div class="info left" data-info-x="-160px" data-info-y="-97px"><span>2307 Beverley Rd Brooklyn, New York 11226 U.S.</span></div>
                      </div>
                      <div class="img-hotspot-pointer" data-spot-x="68%" data-spot-y="23%"><img src="/front/assets/images/background/map-pointer.png" alt="pointer"/>
                        <div class="info left" data-info-x="-160px" data-info-y="-97px"><span>2307 Beverley Rd Brooklyn, New York 11226 U.S.</span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6 offset-lg-1">
                <p class="paragraph">Our staff strives to make each interaction with patients clear, concise, and <Br> inviting. Support them important work of Medicsh Hospital by making a <Br> much-needed donation today.</p>
                <p class="heading-desc">We will work with you to develop individualised care plans, including management of chronic diseases. If we cannot assist, we can provide referrals or advice about the type of practitioner you require. We treat all enquiries sensitively and in the strictest confidence.</p>
                <div class="accordion" id="accordion03">
                  <div class="card">
                    <div class="card-heading"><a class="card-link collapsed" data-hover="" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse01-1" href="#collapse01-1">Which Plan Is Right For Me?</a></div>
                    <div class="collapse" id="collapse01-1" data-bs-parent="#accordion03">
                      <div class="card-body">Our staff strives to make each interaction with patients clear, concise, and inviting. Support the important work of Medicsh Hospital by making a much-needed donation today. We will work with you to develop individualised care plans, including management of chronic diseases.</div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-heading"><a class="card-link collapsed" data-hover="" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse01-2" href="#collapse01-2">Do I have to commit to a contract? </a></div>
                    <div class="collapse" id="collapse01-2" data-bs-parent="#accordion03">
                      <div class="card-body">Our staff strives to make each interaction with patients clear, concise, and inviting. Support the important work of Medicsh Hospital by making a much-needed donation today. We will work with you to develop individualised care plans, including management of chronic diseases.</div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-heading"><a class="card-link  " data-hover="" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse01-3" href="#collapse01-3">What Payment Methods Are Available? </a></div>
                    <div class="collapse show" id="collapse01-3" data-bs-parent="#accordion03">
                      <div class="card-body">Our staff strives to make each interaction with patients clear, concise, and inviting. Support the important work of Medicsh Hospital by making a much-needed donation today. We will work with you to develop individualised care plans, including management of chronic diseases.</div>
                    </div>
                  </div>
                </div><a class="btn btn--primary" href="contact.html">make a gift <i class="fas fa-heart"></i></a>
              </div>
            </div>
            <!-- End .row-->
          </div>
          <!-- End .heading-->
        </div>
        <!-- End .container-->
      </section>
      <section class="testimonial testimonial-3 bg-overlay bg-overlay-theme2" id="testimonial-4">
        <div class="bg-section"> <img src="/front/assets/images/background/2.jpg" alt="background-img"/></div>
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-4">
              <div class="heading heading-light heading-10">
                <p class="heading-subtitle">the best medical care</p>
                <h2 class="heading-title">patient's inspiring stories of hope !</h2>
              </div>
              <div class="testimonial-thumbs">
                <div class="testimonial-thumb active" data-hover="">
                  <div class="thumb-img"> <img src="/front/assets/images/testimonial/1.jpg" alt="Testimonial Author"/><i class="icon-Quote-Icon"></i></div>
                  <div class="thumb-body"> 
                    <h6>sami wade</h6>
                    <p>promina</p>
                  </div>
                </div>
                <div class="testimonial-thumb" data-hover="">
                  <div class="thumb-img"> <img src="/front/assets/images/testimonial/2.jpg" alt="Testimonial Author"/><i class="icon-Quote-Icon"></i></div>
                  <div class="thumb-body"> 
                    <h6>john peter</h6>
                    <p>optima inc</p>
                  </div>
                </div>
                <div class="testimonial-thumb" data-hover="">
                  <div class="thumb-img"> <img src="/front/assets/images/testimonial/3.jpg" alt="Testimonial Author"/><i class="icon-Quote-Icon"></i></div>
                  <div class="thumb-body"> 
                    <h6>sony blake</h6>
                    <p>koira ind</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-7 offset-lg-1">
              <div class="testimonials-holder">
                <div class="carousel owl-carousel custom-carousel" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="false" data-space="0" data-loop="false" data-speed="800">
                  <div class="testimonial-panel">
                    <div class="testimonial-body">
                      <div class="testimonial-content">
                        <div class="testimonial-icon"></div>
                        <p>Their doctors include highly qualified practitioners who come from a range of backgrounds &amp; bring with them a diversity of skills and special interests. They also registered nurses available to triage any urgent matters, and the administration and staff all have exceptional skills!!</p>
                        <div class="testimonial-rating"> <span class="num">4.9</span>
                          <div class="rating-body"> 
                            <p><a href="javascript:void(0)" data-hover=""><span>zodoc</span> Overall Rating ,</a> based<br/> on 7541 reviews</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="testimonial-panel">
                    <div class="testimonial-body">
                      <div class="testimonial-content">
                        <div class="testimonial-icon"></div>
                        <p>Their doctors include highly qualified practitioners who come from a range of backgrounds &amp; bring with them a diversity of skills and special interests. They also registered nurses available to triage any urgent matters, and the administration and staff all have exceptional skills!</p>
                        <div class="testimonial-rating"> <span class="num">4.9</span>
                          <div class="rating-body"> 
                            <p><a href="javascript:void(0)" data-hover=""><span>zodoc</span> Overall Rating ,</a> based<br/> on 7541 reviews</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="testimonial-panel">
                    <div class="testimonial-body">
                      <div class="testimonial-content">
                        <div class="testimonial-icon"></div>
                        <p>Their doctors include highly qualified practitioners who come from a range of backgrounds &amp; bring with them a diversity of skills and special interests. They also registered nurses available to triage any urgent matters, and the administration and staff all have exceptional skills!!</p>
                        <div class="testimonial-rating"> <span class="num">4.9</span>
                          <div class="rating-body"> 
                            <p><a href="javascript:void(0)" data-hover=""><span>zodoc</span> Overall Rating ,</a> based<br/> on 7541 reviews</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="custom-navs"><a class="prev" href="javascript:void(0)" data-hover=""><span class="line"> <span> </span></span><span>previous</span></a><a class="next" href="javascript:void(0)" data-hover=""><span>next</span><span class="line"> <span> </span></span></a></div>
              </div>
            </div>
          </div>
          <div class="contact-panel contact-panel-5">
            <div class="row">
              <div class="col-12 col-lg-6">
                <div class="contact-card">
                  <div class="contact-body">
                    <h5 class="card-heading">book an appointment</h5>
                    <p class="card-desc">Please feel welcome to contact our staff with any general or medical enquiry. Our doctors will receive or return any urgent calls.</p>
                    <form class="contactForm" method="post" action="/front/assets/php/contact.php">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="select-holder">
                            <select class="form-control">
                              <option value="default">bathology clinic</option>
                              <option value="AL">neurology clinic </option>
                              <option value="AK">cardiology clinic </option>
                            </select>
                            <div class="badge">department</div>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="select-holder">
                            <select class="form-control">
                              <option value="default">michael brian</option>
                              <option value="AL">maria andoloro</option>
                              <option value="AK">richard muldoone</option>
                            </select>
                            <div class="badge">choose doctor</div>
                          </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6">
                          <input class="form-control" type="text" name="contact-name" placeholder="Name" required=""/>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                          <input class="form-control" type="text" name="contact-email" placeholder="Email" required=""/>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                          <input class="form-control" type="text" name="contact-phone" placeholder="Phone" required=""/>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                          <div class="date-select">
                            <input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="select date" name="contact-date" value="" required=""/><i class="fas fa-calendar-day"></i>
                          </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                          <div class="time-select">
                            <input class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')" placeholder="select time" name="contact-date" value="" required=""/><i class="fas fa-clock"></i>
                          </div>
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
              <div class="col-12 col-lg-5 offset-lg-1 img-card-holder">
                <div class="img-card img-card-2 bg-overlay bg-overlay-theme">
                  <div class="bg-section"><img src="/front/assets/images/contact/2.jpg" alt="image"/></div>
                  <div class="card-content">
                    <h3>delivering  best care for family.</h3>
                    <div>
                      <p>With modern, busy lifestyles, it’s easy to neglect your health you put everyone first. So, we’re here for your family.</p><a class="btn btn--white btn-line btn-line-after" href="#"><span>find a doctor</span><span class="line"><span></span></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End .contact-panel-->
        </div>
        <!-- End .container-->
      </section>
      <section class="blog blog-grid blog-grid-2" id="blog-1">
        <div class="container">
          <div class="row"> 
            <div class="col-12 col-lg-6 offset-lg-3">
              <div class="heading heading-7 text-center">
                <p class="heading-subtitle">health essentials</p>
                <h2 class="heading-title">recent articles</h2>
              </div>
            </div>
          </div>
          <!-- End .row-->
          <div class="carousel owl-carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="200">
            <div>
              <div class="blog-entry" data-hover="">
                <div class="entry-img">
                  <div class="entry-date">
                    <div class="entry-content"><span class="day">20</span><span class="month">jan</span><span class="year">2021</span></div>
                  </div>
                  <!-- End .entry-date--><a href="blog-single-sidebar.html"><img src="/front/assets/images/blog/grid/1.jpg" alt="6 tips to protect your mental health when sick"/></a>
                </div>
                <!-- End .entry-img-->
                <div class="entry-content">
                  <div class="entry-meta">
                    <div class="entry-category"><a href="javascript:void(0)">mental health</a><a href="javascript:void(0)">wellness</a>
                    </div>
                    <div class="divider"></div>
                    <div class="entry-author"> 
                      <p>martin king</p>
                    </div>
                  </div>
                  <div class="entry-title">
                    <h4><a href="blog-single-sidebar.html">6 tips to protect your mental health when sick</a></h4>
                  </div>
                  <div class="entry-bio">
                    <p>It’s normal to feel anxiety, worry and grief any time you’re diagnosed with a condition that’s certainly true if you test positive for COVID-19, or...</p>
                  </div>
                  <div class="entry-more"> <a class="btn btn--white btn-line btn-line-before btn-line-inversed" href="blog-single-sidebar.html"> 
                      <div class="line"> <span> </span></div><span>read more</span></a></div>
                </div>
              </div>
              <!-- End .entry-content-->
            </div>
            <div>
              <div class="blog-entry" data-hover="">
                <div class="entry-img">
                  <div class="entry-date">
                    <div class="entry-content"><span class="day">20</span><span class="month">jan</span><span class="year">2021</span></div>
                  </div>
                  <!-- End .entry-date--><a href="blog-single-sidebar.html"><img src="/front/assets/images/blog/grid/2.jpg" alt="Unsure About Wearing a Face Mask? How and Why"/></a>
                </div>
                <!-- End .entry-img-->
                <div class="entry-content">
                  <div class="entry-meta">
                    <div class="entry-category"><a href="javascript:void(0)">infectious</a><a href="javascript:void(0)">tips</a>
                    </div>
                    <div class="divider"></div>
                    <div class="entry-author"> 
                      <p>John Ezak</p>
                    </div>
                  </div>
                  <div class="entry-title">
                    <h4><a href="blog-single-sidebar.html">Unsure About Wearing a Face Mask? How and Why</a></h4>
                  </div>
                  <div class="entry-bio">
                    <p>That means that you should still be following any shelter-in-place orders in your community. But when you’re venturing out to the grocery store, pharmacy or...</p>
                  </div>
                  <div class="entry-more"> <a class="btn btn--white btn-line btn-line-before btn-line-inversed" href="blog-single-sidebar.html"> 
                      <div class="line"> <span> </span></div><span>read more</span></a></div>
                </div>
              </div>
              <!-- End .entry-content-->
            </div>
            <div>
              <div class="blog-entry" data-hover="">
                <div class="entry-img">
                  <div class="entry-date">
                    <div class="entry-content"><span class="day">20</span><span class="month">jan</span><span class="year">2021</span></div>
                  </div>
                  <!-- End .entry-date--><a href="blog-single-sidebar.html"><img src="/front/assets/images/blog/grid/3.jpg" alt="Tips for Eating Healthy When Working From Home"/></a>
                </div>
                <!-- End .entry-img-->
                <div class="entry-content">
                  <div class="entry-meta">
                    <div class="entry-category"><a href="javascript:void(0)">lifestyle</a><a href="javascript:void(0)">nutrition</a>
                    </div>
                    <div class="divider"></div>
                    <div class="entry-author"> 
                      <p>Saul Wade</p>
                    </div>
                  </div>
                  <div class="entry-title">
                    <h4><a href="blog-single-sidebar.html">Tips for Eating Healthy When Working From Home</a></h4>
                  </div>
                  <div class="entry-bio">
                    <p>You’re on a conference call and somehow wandered into the kitchen. Next thing know you’re eating crackers and dry cereal out of the box. Or...</p>
                  </div>
                  <div class="entry-more"> <a class="btn btn--white btn-line btn-line-before btn-line-inversed" href="blog-single-sidebar.html"> 
                      <div class="line"> <span> </span></div><span>read more</span></a></div>
                </div>
              </div>
              <!-- End .entry-content-->
            </div>
            <div>
              <div class="blog-entry" data-hover="">
                <div class="entry-img">
                  <div class="entry-date">
                    <div class="entry-content"><span class="day">20</span><span class="month">jan</span><span class="year">2021</span></div>
                  </div>
                  <!-- End .entry-date--><a href="blog-single-sidebar.html"><img src="/front/assets/images/blog/grid/4.jpg" alt="Why Coronavirus Cases Among Adults Is Bad News"/></a>
                </div>
                <!-- End .entry-img-->
                <div class="entry-content">
                  <div class="entry-meta">
                    <div class="entry-category"><a href="javascript:void(0)">mental health</a><a href="javascript:void(0)">wellness</a>
                    </div>
                    <div class="divider"></div>
                    <div class="entry-author"> 
                      <p>Mark Ezak</p>
                    </div>
                  </div>
                  <div class="entry-title">
                    <h4><a href="blog-single-sidebar.html">Why Coronavirus Cases Among Adults Is Bad News</a></h4>
                  </div>
                  <div class="entry-bio">
                    <p>A new surge of coronavirus cases has spread across the country and while there’s still so much to learn about the virus, how it’s transmitted...</p>
                  </div>
                  <div class="entry-more"> <a class="btn btn--white btn-line btn-line-before btn-line-inversed" href="blog-single-sidebar.html"> 
                      <div class="line"> <span> </span></div><span>read more</span></a></div>
                </div>
              </div>
              <!-- End .entry-content-->
            </div>
            <div>
              <div class="blog-entry" data-hover="">
                <div class="entry-img">
                  <div class="entry-date">
                    <div class="entry-content"><span class="day">20</span><span class="month">jan</span><span class="year">2021</span></div>
                  </div>
                  <!-- End .entry-date--><a href="blog-single-sidebar.html"><img src="/front/assets/images/blog/grid/5.jpg" alt="Why Do People Get Kidney Stones in the Summer?"/></a>
                </div>
                <!-- End .entry-img-->
                <div class="entry-content">
                  <div class="entry-meta">
                    <div class="entry-category"><a href="javascript:void(0)">infectious</a><a href="javascript:void(0)">tips</a>
                    </div>
                    <div class="divider"></div>
                    <div class="entry-author"> 
                      <p>Janette Baker</p>
                    </div>
                  </div>
                  <div class="entry-title">
                    <h4><a href="blog-single-sidebar.html">Why Do People Get Kidney Stones in the Summer?</a></h4>
                  </div>
                  <div class="entry-bio">
                    <p>Summer may have just officially started, but kidney stone season began a couple of weeks ago. Doctors see an increase in kidney stone cases when...</p>
                  </div>
                  <div class="entry-more"> <a class="btn btn--white btn-line btn-line-before btn-line-inversed" href="blog-single-sidebar.html"> 
                      <div class="line"> <span> </span></div><span>read more</span></a></div>
                </div>
              </div>
              <!-- End .entry-content-->
            </div>
            <div>
              <div class="blog-entry" data-hover="">
                <div class="entry-img">
                  <div class="entry-date">
                    <div class="entry-content"><span class="day">20</span><span class="month">jan</span><span class="year">2021</span></div>
                  </div>
                  <!-- End .entry-date--><a href="blog-single-sidebar.html"><img src="/front/assets/images/blog/grid/6.jpg" alt="Do Any Drugs Really Work to Treat Coronavirus?"/></a>
                </div>
                <!-- End .entry-img-->
                <div class="entry-content">
                  <div class="entry-meta">
                    <div class="entry-category"><a href="javascript:void(0)">lifestyle</a><a href="javascript:void(0)">nutrition</a>
                    </div>
                    <div class="divider"></div>
                    <div class="entry-author"> 
                      <p>Marie Black</p>
                    </div>
                  </div>
                  <div class="entry-title">
                    <h4><a href="blog-single-sidebar.html">Do Any Drugs Really Work to Treat Coronavirus?</a></h4>
                  </div>
                  <div class="entry-bio">
                    <p>While most people who get COVID-19 are able to recover at home, the rush is on to find a treatment that’s safe and effective against...</p>
                  </div>
                  <div class="entry-more"> <a class="btn btn--white btn-line btn-line-before btn-line-inversed" href="blog-single-sidebar.html"> 
                      <div class="line"> <span> </span></div><span>read more</span></a></div>
                </div>
              </div>
              <!-- End .entry-content-->
            </div>
          </div>
          <!-- End .carousel-->
        </div>
      </section> --}}
      @include('layouts.partials_front.footer')
      <div class="backtop" id="back-to-top" data-hover="">
        <svg class="bi bi-chevron-up" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"></path>
        </svg>
      </div>
    </div>
    <!--  Footer Scripts==
    -->
    <script src="/front/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/front/assets/js/vendor.min.js"></script>
    <script src="/front/assets/js/functions.js"></script>
  </body>
</html>