<footer class="footer footer-1" style="background-color: #F8F9FA">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="footer-widget widget-contact">
              <div class="footer-widget-title">
                <img class="logo logo-mobile"
                    src="{{ asset('storage/' . $general->logo_white) }}" alt="Meiji Logo" />
              </div>
              <div class="widget-content">
                <p>{!! $general->getTranslation('bio', app()->getLocale()) !!}</p>
                <ul> 
                  <li class="phone"><a href="#"><i class="fas fa-phone-alt"></i> {{ $general->phone_1 }}</a></li>
                  <li class="address"><a href="#">{{ $general->address }}</a></li>
                </ul>
              </div>
            </div>
            <!--  End .col-lg-3-->
          </div>
          <div class="col-sm-6 col-md-3 col-lg-2 offset-lg-0">
            <div class="footer-widget widget-links">
              <div class="footer-widget-title">
                <h5>{{ translate('News') }}</h5>
              </div>
              <div class="widget-content">
                <ul>
                  @foreach($news_categories as $nCategory)
                  <li><a href="{{ route('frontpage.news.category', [
                    'lang' => app()->getLocale(),
                    'slug' => $nCategory->getTranslation('slug', app()->getLocale())
                ]) }}">{{ $nCategory->getTranslation('name', app()->getLocale()) }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <!--  End .col-lg-2-->
          <div class="col-sm-6 col-md-3 col-lg-2">
            <div class="footer-widget widget-links">
              <div class="footer-widget-title">
                <h5>{{ translate('Products') }}</h5>
              </div>
              <div class="widget-content">
                <ul>
                  @foreach($categories as $category)
                  <li><a href="{{ route('frontpage.products.category', [
                    'lang' => app()->getLocale(),
                    'slug' => $category->getTranslation('slug', app()->getLocale())
                ]) }}">{{ $category->getTranslation('name', app()->getLocale()) }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <!--  End .col-lg-2-->
          <div class="col-sm-6 col-md-4 col-lg-2 offset-lg-0">
            <div class="footer-widget widget-links">
              <div class="footer-widget-title">
                <h5>{{ translate('Page') }}</h5>
              </div>
              <div class="widget-content">
                <ul>
                  @foreach ($pages_footer as $page) 
                      <li><a href="{{ route('frontpage.page.show', ['lang' => app()->getLocale(), 'slug' => $page->getTranslation('slug', app()->getLocale())]) }}">{{ $page->getTranslation('title', app()->getLocale()) }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <!--  End .col-lg-2-->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget widget-newsletter">
              <div class="footer-widget-title">
                <h5>newsletter</h5>
              </div>
              <div class="widget-content">
                <form class="form-newsletter mailchimp">
                  <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Your Email Address" required="required"/>
                    <div class="submit">
                      <input type="submit" value=""/>
                    </div>
                  </div>
                  <div class="custom-radio-group">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input class="custom-control-input" type="radio" id="customRadioInline2" name="customRadioInline2" required="required"/>
                      <label for="customRadioInline2">i accept the privacy and terms</label>
                    </div>
                  </div>
                  <div class="subscribe-alert"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!--  End .container-->
    </div>
    <!--  End .footer-center-->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="footer-copyright">
              <div class="copyright"><span>&copy; 2025 by  <a href="/"> {{ $general->name }}</a>. all rights reserved. </span>
                <ul class="list-unstyled social-icons">
                  <li> <a class="share-facebook" href="#"><i class="fab fa-facebook-f"> </i></a></li>
                  <li> <a class="share-instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                  <li> <a class="share-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  End .row-->
    </div>
    <!--  End .footer-bottom-->
  </footer>