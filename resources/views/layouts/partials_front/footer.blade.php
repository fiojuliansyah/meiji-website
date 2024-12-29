<footer class="main-footer">
    <div class="auto-container">
        <div class="widget-section">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h3>Who We Are</h3>
                        </div>
                        <div class="text">
                            <p>{{ $general->address }}</p>
                        </div>
                        <div class="lower-box">
                            <img
                             src="{{ asset('storage/' . $general->logo_white) }}" alt="Meiji Logo" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>{{ translate('News') }}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
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
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>{{ translate('Products') }}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
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
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>{{ translate('Page') }}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                @foreach ($pages_footer as $page) 
                                    <li><a href="{{ route('frontpage.page.show', ['lang' => app()->getLocale(), 'slug' => $page->getTranslation('slug', app()->getLocale())]) }}">{{ $page->getTranslation('title', app()->getLocale()) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget post-widget">
                        <div class="widget-title">
                            <h3>Popular Post</h3>
                        </div>
                        <div class="post-inner">
                            <div class="post">
                                <figure class="post-thumb"><a href="blog-details.html"><img src="assets/images/resource/footer-post-1.jpg" alt=""></a></figure>
                                <span class="post-date">16 July, 2022</span>
                                <h5><a href="blog-details.html">All you Need to Know about this Liver Disease</a></h5>
                            </div>
                            <div class="post">
                                <figure class="post-thumb"><a href="blog-details.html"><img src="assets/images/resource/footer-post-2.jpg" alt=""></a></figure>
                                <span class="post-date">11 August, 2022</span>
                                <h5><a href="blog-details.html">Ensure Your Product Quality with a Biogenix Lab</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright">
                <p>&copy; 2022 <a href="/">{{ $general->name }}</a> All Rights Reserved.</p>
            </div>
    </div>
</footer>