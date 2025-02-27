@extends('layouts.front')

@section('title')
  {{ $product->getTranslation('name', app()->getLocale()) ?? 'News Detail' }}
@endsection

@push('css')
<style>
.blur-section {
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Make sure the filter applies to all content inside the section */
  pointer-events: none; /* Prevents interaction with blurred content */
  user-select: none; /* Prevents text selection while blurred */
}

/* Optional: you can add a semi-transparent overlay for better visual effect */
.blur-overlay {
  position: relative;
}

.blur-overlay::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.2);
  z-index: 1;
  pointer-events: none;
}
</style>
@endpush

@section('content')
<section class="page-title page-title-blank bg-white" id="page-title">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title">
                    <ol class="breadcrumb breadcrumb-long">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('frontpage.products.category', ['lang' => app()->getLocale(), 'slug' => $product->category->getTranslation('slug', app()->getLocale())]) }}">
                                {{ $product->category->getTranslation('name', app()->getLocale()) ?? 'Category' }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ Illuminate\Support\Str::limit(strip_tags($product->getTranslation('name', app()->getLocale())), 20) }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product detail section that will be blurred -->
<section class="single-product blur-overlay" id="single-product">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="product-img"><img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="product image"/><a class="img-popup" href="{{ asset('storage/' . $product->image) }}" alt="product image"></a></div>
          <!-- .product-img end-->
        </div>
        <div class="col-12 col-lg-6">
          <div class="product-content">
            <div class="product-title">
              <h3>{{ $product->getTranslation('name', app()->getLocale()) ?? 'Product Name' }}</h3>
            </div>
            <div class="product-tabs">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a class="active" href="#description" data-bs-target="#description" aria-controls="description" role="tab" data-bs-toggle="tab" aria-selected="true">{{ translate('description') }}</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="description" role="tabpanel">
                    {!! $product->getTranslation('content', app()->getLocale()) ?? 'Product Content' !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Related products section that will also be blurred -->
<section class="shop shop-2 blur-overlay" id="related-products"> 
    <div class="container"> 
      <div class="row"> 
        <div class="col-12"> 
          <h5>{{ translate('related products') }}</h5>
        </div>
      </div>
      <div class="row"> 
        @foreach ($related_products as $related)    
            <div class="col-12 col-md-6 col-lg-3">
            <div class="product-item" data-hover="">
                <div class="product-img"><img src="{{ asset('storage/' . $related->image) }}" alt="Product" style="width: 200px; height: 200px; object-fit: cover;"/><a class="add-to-cart" href="{{ route('frontpage.products.show', [
                    'lang' => app()->getLocale(),
                    'category_slug' => $related->category->getTranslation('slug', app()->getLocale()),
                    'products_slug' => $related->getTranslation('slug', app()->getLocale())
                ]) }}">{{ translate('read more') }}</a>
                <div class="badge"></div>
                </div>
                <div class="product-content">
                <div class="product-title"><a href="shop-single.html">{{ $related->getTranslation('name', app()->getLocale()) ?? 'Product Name' }}</a></div>
                </div>
            </div>
            <!-- .product end-->
            </div>
        @endforeach
      </div>
    </div>
</section>
@endsection

@section('modal')
<div class="modal fade" id="disclaimerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="disclaimerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="disclaimerModalLabel">{{ translate('Important Disclaimer') }}</h5>
              <!-- Tombol close dihapus karena tidak boleh menutup modal tanpa pilihan -->
          </div>
          <div class="modal-body p-0">
              <div class="card border-0 m-0">
                  <div class="row g-0">
                      <div class="col-md-4">
                          <img src="https://static.vecteezy.com/system/resources/previews/005/316/380/non_2x/red-disclaimer-sign-illustration-vector.jpg" 
                              alt="Disclaimer Image"
                              class="img-fluid rounded-start h-100" 
                              style="object-fit: cover;">
                      </div>
                      <div class="col-md-8">
                          <div class="card-body p-4">
                              @if ($general && $general->logo)
                                  <img class="logo logo-dark" src="{{ asset('storage/' . $general->logo) }}" alt="Meiji Logo" width="120px" />
                              @endif
                              <br>
                              <br>
                              <div class="card-text">
                                  <p>
                                      Semua materi yang tertera di list produk PT Meiji Indonesia adalah untuk memberikan informasi yang benar dan tepat pada pengunjung website sesuai dengan latar belakang masing-masing.

                                      Penyalahgunaan kegiatan dari materi yang tertera di Website ini merupakan tanggung jawab pribadi masing-masing dari pengunjung. Dengan ini pengunjung menyatakan bersedia dimintakan keterangan oleh pihak yang berwajib bila diperlukan dan siap diproses sesuai Hukum dan Peraturan Perundang-Undangan yang berlaku di Indonesia.

                                      Apabila ada pihak yang memberikan keterangan yang tidak sesuai dengan hal yang dimaksud diatas, maka PT Meiji Indonesia tidak bertanggungjawab atas dampak yang ditimbulkan baik terhadap diri sendiri maupun kepada masyarakat luas.
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn--primary me-2" id="agreeButton" data-bs-dismiss="modal">
                  {{ translate('Agree') }}
              </button>
              <a href="{{ route('frontpage.products.category', ['lang' => app()->getLocale(), 'slug' => $product->category->getTranslation('slug', app()->getLocale())]) }}" class="btn btn-secondary">
                  {{ translate('Not Agree') }}
              </a>
          </div>
      </div>
  </div>
</div>
@endsection

@push('js')
<script>
  document.addEventListener('DOMContentLoaded', function() {
      // Get sections that need to be blurred
      const singleProductSection = document.getElementById('single-product');
      const relatedProductsSection = document.getElementById('related-products');
      
      // Function to apply blur
      function applyBlur() {
          singleProductSection.classList.add('blur-section');
          relatedProductsSection.classList.add('blur-section');
      }
      
      // Function to remove blur
      function removeBlur() {
          singleProductSection.classList.remove('blur-section');
          relatedProductsSection.classList.remove('blur-section');
      }
      
      // Immediately apply blur when page loads
      applyBlur();
      
      // Initialize modal
      var disclaimerModal = new bootstrap.Modal(document.getElementById('disclaimerModal'), {
          backdrop: 'static', // This prevents closing modal when clicking outside
          keyboard: false // Prevents closing with Esc key
      });
      
      // Check if user has already agreed (using localStorage)
      var hasAgreed = localStorage.getItem('disclaimerAgreed');
      
      if (hasAgreed) {
          // If user already agreed before, remove blur and don't show modal
          removeBlur();
      } else {
          // Show modal for new users
          disclaimerModal.show();
      }
      
      // When agree button is clicked
      document.getElementById('agreeButton').addEventListener('click', function() {
          // Save agreement to localStorage
          localStorage.setItem('disclaimerAgreed', 'true');
          
          // Remove blur effect
          removeBlur();
      });
  });
</script>
@endpush