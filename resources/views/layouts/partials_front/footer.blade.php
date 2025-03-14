<footer class="footer footer-1" style="background-color: #F8F9FA">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="footer-widget widget-contact">
                        <div class="footer-widget-title">
                            <img class="logo logo-mobile" src="{{ asset('storage/' . $general->logo) }}"
                                alt="Meiji Logo" />
                        </div>
                        <div class="widget-content">
                            {{-- <p>{!! $general->getTranslation('bio', app()->getLocale()) !!}</p> --}}
                            <br>
                            <ul>
                                <li class="phone"><a href="#"><i class="fas fa-phone-alt"></i>
                                        {{ $general->phone_1 }}</a></li>
                                <li class="address"><a href="#">{{ $general->address }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--  End .col-lg-3-->
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2 offset-lg-0">
                    <div class="footer-widget widget-links">
                        <div class="footer-widget-title">
                            <h5 style="color: #283B6A">{{ translate('News') }}</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                @foreach ($news_categories as $nCategory)
                                    <li><a
                                            href="{{ route('frontpage.news.category', [
                                                'lang' => app()->getLocale(),
                                                'slug' => $nCategory->getTranslation('slug', app()->getLocale()),
                                            ]) }}">{{ $nCategory->getTranslation('name', app()->getLocale()) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--  End .col-lg-2-->
                <div class="col-sm-6 col-md-3 col-lg-2">
                    <div class="footer-widget widget-links">
                        <div class="footer-widget-title">
                            <h5 style="color: #283B6A">{{ translate('Products') }}</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a
                                            href="{{ route('frontpage.products.category', [
                                                'lang' => app()->getLocale(),
                                                'slug' => $category->getTranslation('slug', app()->getLocale()),
                                            ]) }}">{{ $category->getTranslation('name', app()->getLocale()) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--  End .col-lg-2-->
                <div class="col-sm-6 col-md-4 col-lg-2 offset-lg-0">
                    <div class="footer-widget widget-links">
                        <div class="footer-widget-title">
                            <h5 style="color: #283B6A">{{ translate('Page') }}</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                @foreach ($pages_footer as $page)
                                    <li><a
                                            href="{{ route('frontpage.page.show', ['lang' => app()->getLocale(), 'slug' => $page->getTranslation('slug', app()->getLocale())]) }}">{{ $page->getTranslation('title', app()->getLocale()) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="footer-copyright">
                      <div class="copyright">
                          <ul class="list-unstyled social-icons">
                              <li> <a class="share-facebook" href="#"><i class="fab fa-facebook-f"> </i></a>
                              </li>
                              <li> <a class="share-instagram" href="#"><i class="fab fa-instagram"></i></a>
                              </li>
                              <li> <a class="share-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                          </ul>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 text-center">
                    <div class="copyright"><span style="color: #283B6A">&copy; 2025 by  <a href="/"> {{ $general->name }}</a>. all rights reserved. </span>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</footer>
