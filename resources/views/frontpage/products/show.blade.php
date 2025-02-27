@extends('layouts.front')

@section('title')
  {{ $product->getTranslation('name', app()->getLocale()) ?? 'News Detail' }}
@endsection

@push('css')
<style>
@import url("https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900");

/* Style untuk blur effect */
.blur-container {
  position: relative;
  width: 100%;
  min-height: 100vh;
  transition: 0.5s;
}

.blur-container.active {
  filter: blur(10px);
  pointer-events: none;
  user-select: none;
}

/* Styling untuk popup modal */
#disclaimerPopup {
  position: fixed;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 80%;
  max-width: 800px;
  padding: 0;
  box-shadow: 0 5px 30px rgba(0, 0, 0, 0.3);
  background: #fff;
  visibility: hidden;
  opacity: 0;
  transition: 0.5s;
  z-index: 1050;
  border-radius: 8px;
  overflow: hidden;
}

#disclaimerPopup.active {
  top: 50%;
  visibility: visible;
  opacity: 1;
  transition: 0.5s;
}

.popup-footer {
  padding: 15px;
  display: flex;
  justify-content: center;
  background-color: #f8f9fa;
  border-top: 1px solid #dee2e6;
}

.popup-footer .btn {
  margin: 0 10px;
}
</style>
@endpush

@section('content')
<div class="blur-container" id="contentBlur">
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
  
  <section class="single-product" id="single-product">
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
  
  <section class="shop shop-2"> 
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
                  <div class="product-title"><a href="{{ route('frontpage.products.show', [
                      'lang' => app()->getLocale(),
                      'category_slug' => $related->category->getTranslation('slug', app()->getLocale()),
                      'products_slug' => $related->getTranslation('slug', app()->getLocale())
                  ]) }}">{{ $related->getTranslation('name', app()->getLocale()) ?? 'Product Name' }}</a></div>
                  </div>
              </div>
              <!-- .product end-->
              </div>
          @endforeach
        </div>
      </div>
  </section>
</div>

<!-- Custom Popup (bukan modal Bootstrap) -->
<div id="disclaimerPopup">
  <div class="card border-0 m-0">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="https://static.vecteezy.com/system/resources/previews/005/316/380/non_2x/red-disclaimer-sign-illustration-vector.jpg" 
            alt="Disclaimer Image"
            class="img-fluid h-100" 
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
            <h5>{{ translate('Important Disclaimer') }}</h5>
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
  <div class="popup-footer">
    <button type="button" class="btn btn--primary" id="agreeButton">
      {{ translate('Agree') }}
    </button>
    <a href="{{ route('frontpage.products.category', ['lang' => app()->getLocale(), 'slug' => $product->category->getTranslation('slug', app()->getLocale())]) }}" class="btn btn-secondary">
      {{ translate('Not Agree') }}
    </a>
  </div>
</div>
@endsection

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Fungsi untuk toggle blur dan popup
  function toggleBlur() {
    document.getElementById('contentBlur').classList.toggle('active');
    document.getElementById('disclaimerPopup').classList.toggle('active');
  }
  
  // Cek apakah sudah pernah setuju sebelumnya
  var hasAgreed = localStorage.getItem('disclaimerAgreed');
  
  // Jika belum pernah setuju, aktifkan blur dan tampilkan popup
  if (!hasAgreed) {
    toggleBlur();
  }
  
  // Event listener untuk tombol agree
  document.getElementById('agreeButton').addEventListener('click', function() {
    toggleBlur(); // Sembunyikan popup dan hapus blur
    localStorage.setItem('disclaimerAgreed', 'true');
  });
});
</script>
@endpush