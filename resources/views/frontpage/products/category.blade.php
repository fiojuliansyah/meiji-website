@extends('layouts.front')

@section('title', 'Prescription Product - Meiji Indonesia')

@section('content')
    <section class="shop" id="shop">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-9">
              <div class="row">
                <div class="col-12">
                  <div class="shop-options">
                    <div class="products-show"> 
                      <p>showing 1:9 of 45 products</p>
                    </div>
                    <div class="products-sort">
                      <div class="select-holder">
                        <select>
                          <option selected="" value="Default">Product Name</option>
                          <option value="Larger">Newest Items</option>
                          <option value="Larger">oldest Items</option>
                          <option value="Larger">Hot Items</option>
                          <option value="Small">Highest Price</option>
                          <option value="Medium">Lowest Price</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- .shop-options end-->
                </div>
                <!-- End .col-lg-12-->
              </div>
              <div class="row">
                @forelse ($products as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                    <div class="product-item" data-hover="">
                        <div class="product-img"><img src="{{ asset('storage/' . $item->image) }}" alt="Product" style="width: 200px; height: 200px; object-fit: cover;" /><a class="add-to-cart" href="{{ route('frontpage.products.show', [
                            'lang' => app()->getLocale(),
                            'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                            'products_slug' => $item->getTranslation('slug', app()->getLocale())
                        ]) }}"><i class="fas fa-shopping-cart"></i> Detail</a>
                        <div class="badge"></div>
                        </div>
                        <!-- .product-img end-->
                        <div class="product-content">
                        <div class="product-title"><a href="{{ route('frontpage.products.show', [
                            'lang' => app()->getLocale(),
                            'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                            'products_slug' => $item->getTranslation('slug', app()->getLocale())
                        ]) }}">green tea</a></div>
                        <!-- .product-title end-->
                        <div class="product-price"><span>$15.00</span></div>
                        <!-- .product-price end-->
                        </div>
                        <!-- .product-content end-->
                    </div>
                    <!-- .product end-->
                    </div>  
                @empty
                    <div class="col-12 text-center">
                        <p>{{ translate('No news found in this category.') }}</p>
                    </div>
                @endforelse
              </div>
              <!-- End .row-->
            </div>
            <!-- End .col-lg-9-->
            <!-- 
            ============================
            Sidebar Shop #01
            ============================
            -->
            <div class="col-12 col-lg-3">
              <div class="sidebar sidebar-shop">
                <!-- Categories-->
                <div class="widget widget-categories">
                  <div class="widget-title">
                    <h5>categories</h5>
                  </div>
                  <div class="widget-content">
                    <ul class="list-unstyled">
                      <li><a href="javascript:void(0)">neurology</a><span>9</span></li>
                      <li><a href="javascript:void(0)">cardiology</a><span>2</span></li>
                      <li><a href="javascript:void(0)">pathology</a><span>5</span></li>
                      <li><a href="javascript:void(0)">labotatory</a><span>1</span></li>
                      <li><a href="javascript:void(0)">pediatric</a><span>7</span></li>
                    </ul>
                  </div>
                </div>
                <!-- End .widget-categories-->
                <!-- Search-->
                <div class="widget widget-search">
                  <div class="widget-title"> 
                    <h5>search</h5>
                  </div>
                  <div class="widget-content">
                    <form class="form-search">
                      <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search ..."/><span class="input-group-btn">
                          <button class="btn" type="button"><i class="icon-search"></i></button></span>
                      </div>
                      <!-- /input-group-->
                    </form>
                  </div>
                </div>
                <!-- End .widget-search-->
                <!-- Recent Products-->
                <div class="widget widget-recent-products">
                  <div class="widget-title">
                    <h5>products</h5>
                  </div>
                  <div class="widget-content">
                    <!-- Start .product-->
                    <div class="product">
                      <div class="product-img"><img src="assets/images/shop/thumb/1.jpg" alt="product"/></div>
                      <div class="product-desc">
                        <div class="product-title"><a href="shop-single.html">calming herps</a></div>
                        <div class="product-meta"><span>$10.00</span></div>
                      </div>
                    </div>
                    <!-- End .product -->
                    <!-- Start .product-->
                    <div class="product">
                      <div class="product-img"><img src="assets/images/shop/thumb/2.jpg" alt="product"/></div>
                      <div class="product-desc">
                        <div class="product-title"><a href="shop-single.html">goji powder</a></div>
                        <div class="product-meta"><span>$19.00</span></div>
                      </div>
                    </div>
                    <!-- End .product -->
                    <!-- Start .product-->
                    <div class="product">
                      <div class="product-img"><img src="assets/images/shop/thumb/3.jpg" alt="product"/></div>
                      <div class="product-desc">
                        <div class="product-title"><a href="shop-single.html">biotin complex</a></div>
                        <div class="product-meta"><span>$25.00</span></div>
                      </div>
                    </div>
                    <!-- End .product -->
                  </div>
                </div>
                <!-- End .widget-recent-products -->
                <!-- Widget Filter-->
                <div class="widget widget-filter">
                  <div class="widget-title">
                    <h5>filter by price</h5>
                  </div>
                  <div class="widget-content clearfix">
                    <div id="slider-range"></div>
                    <p class="slider-mount">
                      <label for="amount">Price:  </label>
                      <input id="amount" type="text" readonly=""/><a class="btn-filter" href="#">Filter</a>
                    </p>
                  </div>
                </div>
                <!-- End .widget-filter-->
                <!-- Tags-->
                <div class="widget widget-tags">
                  <div class="widget-title">
                    <h5>Tags</h5>
                  </div>
                  <div class="widget-content"><a href="javascript:void(0)">life style</a><a href="javascript:void(0)">nutrition</a><a href="javascript:void(0)">infectious</a><a href="javascript:void(0)">disease</a><a href="javascript:void(0)">insights</a><a href="javascript:void(0)">urinary</a><a href="javascript:void(0)">tips</a>
                  </div>
                </div>
                <!-- End .widget-tags -->
              </div>
              <!-- End .sidebar-->
            </div>
            <!-- End .col-lg-3-->
          </div>
          <!-- End .row-->
          <div class="row">
            {{ $products->links() }}
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
    </section>
@endsection
