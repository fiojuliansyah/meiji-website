  <header class="d-none d-xl-block">
      <div class="header__area tp-footer-2" id="header-sticky">
          <div class="container-fluid">
              <div class="row align-items-center">
                  <div class="col-xxl-2 col-lg-3">
                      <div class="logo">
                          <a href="index.html"><img
                                  src="{{ asset('frontpage_assets/img/logo-meiji-1.png') }}"
                                  alt="logo"></a>
                      </div>
                  </div>
                  <div class="col-xxl-10 col-lg-9">
                      <div class="main-menu">
                          <nav id="mobile-menu ">
                              <ul>
                                  <li class="has-dropdown ">
                                      <a href="#"
                                          class="{{ request()->routeIs('frontpage.company-profile') || request()->routeIs('frontpage.company-history') || request()->routeIs('frontpage.vision-mission') ? 'active' : '' }}">About
                                          Us</a>
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="{{ route('frontpage.company-profile') }}"
                                                  class="{{ request()->routeIs('frontpage.company-profile') ? 'active' : '' }}">Company
                                                  Profile</a>
                                          </li>
                                          <li>
                                              <a href="{{ route('frontpage.company-history') }} "
                                                  class="{{ request()->routeIs('frontpage.company-history') ? 'active' : '' }}">Company
                                                  History</a>
                                          </li>
                                          <li>
                                              <a href="{{ route('frontpage.vision-mission') }}"
                                                  class="{{ request()->routeIs('frontpage.vision-mission') ? 'active' : '' }}">Vision
                                                  and Mission</a>
                                          </li>
                                      </ul>
                                  </li>

                                  <li>
                                      <a href="#"
                                          class="has-dropdown {{ request()->routeIs('frontpage.press-conference') || request()->routeIs('frontpage.product-launch') || request()->routeIs('frontpage.other-information') ? 'active' : '' }}">News</a>
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="{{ route('frontpage.press-conference') }}"
                                                  class="{{ request()->routeIs('frontpage.press-conference') ? 'active' : '' }}">Press
                                                  Conference</a>
                                          </li>
                                          <li
                                              class="{{ request()->routeIs('frontpage.product-launch') ? 'active' : '' }}">
                                              <a href="{{ route('frontpage.product-launch') }}">Product
                                                  Launch</a>
                                          </li>
                                          <li
                                              class="{{ request()->routeIs('frontpage.other-information') ? 'active' : '' }}">
                                              <a href="{{ route('frontpage.other-information') }}">Other
                                                  Information</a>
                                          </li>
                                      </ul>
                                  </li>

                                  <li>
                                      <a href="#"
                                          class="has-dropdown {{ request()->routeIs('frontpage.prescription-product') || request()->routeIs('frontpage.consumer-health') || request()->routeIs('frontpage.animal-health') ? 'active' : '' }}">Products</a>
                                      <ul class="sub-menu">
                                          <li
                                              class="{{ request()->routeIs('frontpage.prescription-product') ? 'active' : '' }}">
                                              <a href="{{ route('frontpage.prescription-product') }}">Prescription
                                                  Product</a>
                                          </li>
                                          <li
                                              class="{{ request()->routeIs('frontpage.consumer-health') ? 'active' : '' }}">
                                              <a href="{{ route('frontpage.consumer-health') }}">Consumer
                                                  Health</a>
                                          </li>
                                          <li
                                              class="{{ request()->routeIs('frontpage.animal-health') ? 'active' : '' }}">
                                              <a href="{{ route('frontpage.animal-health') }}">Animal
                                                  Health</a>
                                          </li>
                                      </ul>
                                  </li>

                                  <li>
                                      <a href="#"
                                          class="has-dropdown {{ request()->routeIs('frontpage.r-and-d') ? 'active' : '' }}">R&D</a>
                                      <ul class="sub-menu">
                                          <li
                                              class="{{ request()->routeIs('frontpage.r-and-d') ? 'active' : '' }}">
                                              <a href="{{ route('frontpage.r-and-d') }}">R&D
                                                  Activities</a>
                                          </li>
                                      </ul>
                                  </li>

                                  <li class="has-dropdown">
                                      <a href="#"
                                          class="has-dropdown
                                          {{ request()->routeIs('frontpage.csr') || request()->routeIs('frontpage.pharmacovigilance')? 'active' : '' }}">Activities</a>
                                      <ul class="sub-menu">
                                          <li><a href="{{ route('frontpage.csr') }}">CSR List</a></li>
                                          <li><a
                                                  href="{{ route('frontpage.pharmacovigilance') }}">Pharmacovigilance</a>
                                          </li>
                                      </ul>
                                  </li>

                                  <li
                                      class="has-dropdown {{ request()->routeIs('frontpage.career') ? 'active' : '' }}">
                                      <a href="#">Career</a>
                                      <ul class="sub-menu">
                                          <li
                                              class="{{ request()->routeIs('frontpage.career') ? 'active' : '' }}">
                                              <a href="{{ route('frontpage.career') }}">Career and
                                                  Vacancy List</a>
                                          </li>
                                      </ul>
                                  </li>

                                  <li>
                                      <a href="{{ route('frontpage.faq') }}"
                                          class="{{ request()->routeIs('frontpage.faq') ? 'active' : '' }}">FAQ</a>
                                  </li>

                                  <li>
                                      <a href="{{ route('frontpage.contact') }}"
                                          class="{{ request()->routeIs('frontpage.contact') ? 'active' : '' }}">Contact</a>
                                  </li>
                              </ul>
                          </nav>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>


  <div id="header-mob-sticky" class="tp-mobile-header-area tp-home-lg-banner pt-15 pb-15 d-xl-none">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-4">
                  <div class="tp-mob-logo">
                      <a href="index.html"><img
                              src="{{ asset('frontpage_assets/img/logo-meiji-1.png') }}"
                              alt="logo"></a>
                  </div>
              </div>
              <div class="col-8">
                  <div class="tp-mobile-bar d-flex align-items-center justify-content-end">
                      <div class="tp-bt-btn-banner d-none d-md-block d-xl-none mr-30">
                          <a class="tp-bt-btn" href="tel:123456">
                              <svg width="14" height="19" viewBox="0 0 14 19" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="2" cy="2" r="2" fill="#0E63FF" />
                                  <circle cx="7" cy="2" r="2" fill="#0E63FF" />
                                  <circle cx="12" cy="2" r="2" fill="#0E63FF" />
                                  <circle cx="12" cy="7" r="2" fill="#0E63FF" />
                                  <circle cx="12" cy="12" r="2" fill="#0E63FF" />
                                  <circle cx="7" cy="7" r="2" fill="#0E63FF" />
                                  <circle cx="7" cy="12" r="2" fill="#0E63FF" />
                                  <circle cx="7" cy="17" r="2" fill="#0E63FF" />
                                  <circle cx="2" cy="7" r="2" fill="#0E63FF" />
                                  <circle cx="2" cy="12" r="2" fill="#0E63FF" />
                              </svg><span>Help Desk :</span>+91 590
                              088 55
                          </a>
                      </div>
                      <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                  </div>
              </div>
          </div>
      </div>
  </div>
