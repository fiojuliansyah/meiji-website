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
                      <h4>{{ $category->getTranslation('name', app()->getLocale()) }}</h4>
                    </div>
                    <div class="products-sort">
                      <div class="select-holder">
                        <select>
                          <option selected="" value="Default">Product Name</option>
                          <option value="Larger">Newest Items</option>
                          <option value="Larger">Oldest Items</option>
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
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                      <div class="product-item" data-hover="" style="height: 100%; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden;">
                        <div class="product-img">
                          <a href="{{ route('frontpage.products.show', [
                              'lang' => app()->getLocale(),
                              'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                              'products_slug' => $item->getTranslation('slug', app()->getLocale())
                          ]) }}" style="display: block; width: 100%; height: 250px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $item->image) }}" 
                                 alt="{{ $item->getTranslation('name', app()->getLocale()) }}" 
                                 style="width: 100%; height: 100%; object-fit: contain; transition: transform 0.3s ease;"
                                 onmouseover="this.style.transform='scale(1.05)'" 
                                 onmouseout="this.style.transform='scale(1)'"/>
                          </a>
                        </div>
                        <!-- .product-img end-->
                        <div class="product-content" style="padding: 15px; text-align: center;">
                          <div class="product-title">
                            <h5><a href="{{ route('frontpage.products.show', [
                                'lang' => app()->getLocale(),
                                'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                'products_slug' => $item->getTranslation('slug', app()->getLocale())
                            ]) }}">{{ $item->getTranslation('name', app()->getLocale()) }}</a></h5>
                          </div>
                          <!-- .product-title end-->
                          <div class="product-desc" style="margin-top: 10px;">
                            <p>{!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('description', app()->getLocale())), 80) !!}</p>
                          </div>
                          <div class="product-action" style="margin-top: 15px; display: flex; justify-content: center;">
                            <a class="btn btn--primary" href="{{ route('frontpage.products.show', [
                                'lang' => app()->getLocale(),
                                'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                'products_slug' => $item->getTranslation('slug', app()->getLocale())
                            ]) }}">
                              {{ translate('View Details') }}
                            </a>
                        </div>
                        </div>
                        <!-- .product-content end-->
                      </div>
                      <!-- .product end-->
                    </div>  
                @empty
                    <div class="col-12 text-center">
                        <p>{{ translate('No products found in this category.') }}</p>
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
                    <h5>{{ translate('Categories') }}</h5>
                  </div>
                  <div class="widget-content">
                    <ul class="list-unstyled">
                      @foreach($categories as $category)
                        @if ($category->is_validate == 1)
                            <li class="nav-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#validateModal{{ $category->id }}">
                                    <span>{{ $category->getTranslation('name', app()->getLocale()) }}</span>
                                </a>
                            </li>
                            <br>
                        @else   
                            <li class="nav-item">
                                <a href="{{ route('frontpage.products.category', [
                                    'lang' => app()->getLocale(),
                                    'slug' => $category->getTranslation('slug', app()->getLocale())
                                ]) }}">
                                    <span>{{ $category->getTranslation('name', app()->getLocale()) }}</span>
                                </a>
                            </li>
                            <br>
                        @endif
                      @endforeach
                    </ul>
                  </div>
                </div>
                <!-- End .widget-categories-->
                <!-- Search-->
                <div class="widget widget-search">
                  <div class="widget-title"> 
                    <h5>{{ translate('Search') }}</h5>
                  </div>
                  <div class="widget-content">
                    <form class="form-search" action="{{ route('frontpage.products.search', ['lang' => app()->getLocale()]) }}" method="GET">
                      <div class="input-group">
                        <input class="form-control" type="text" name="q" placeholder="{{ translate('Search products...') }}"/>
                        <span class="input-group-btn">
                          <button class="btn" type="submit"><i class="icon-search"></i></button>
                        </span>
                      </div>
                      <!-- /input-group-->
                    </form>
                  </div>
                </div>
              </div>
              <!-- End .sidebar-->
            </div>
            <!-- End .col-lg-3-->
          </div>
          <!-- End .row-->
          <div class="row">
            <div class="col-12">
              {{ $products->links() }}
            </div>
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
    </section>
@endsection