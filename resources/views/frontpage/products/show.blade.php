@extends('layouts.front')

@section('title')
  {{ $product->getTranslation('name', app()->getLocale()) ?? 'News Detail' }}
@endsection

@push('css')
<style>
  body.blurred .container:not(.modal *) {
    filter: blur(5px);
    pointer-events: none; /* Mencegah interaksi saat blur */
    user-select: none;
  }

  body.blurred::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.5);
    z-index: 1000;
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
            </div>
        @endforeach
      </div>
    </div>
</section>
@endsection

<!-- Modal Disclaimer -->
@section('modal')
<div class="modal fade" id="disclaimerModal" tabindex="-1" aria-labelledby="disclaimerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="disclaimerModalLabel">{{ translate('Important Disclaimer') }}</h5>
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
    // Tambahkan class blur ke body
    document.body.classList.add('blurred');
    
    // Cek apakah sudah pernah setuju sebelumnya
    var hasAgreed = localStorage.getItem('disclaimerAgreed');
    
    // Fungsi untuk inisialisasi modal
    function initModal() {
        var myModal = new bootstrap.Modal(document.getElementById('disclaimerModal'), {
            backdrop: 'static',
            keyboard: false
        });
        
        // Tampilkan modal
        myModal.show();
        
        // Event listener untuk tombol agree
        document.getElementById('agreeButton').addEventListener('click', function() {
            // Simpan status setuju
            localStorage.setItem('disclaimerAgreed', 'true');
            // Hapus blur
            document.body.classList.remove('blurred');
        });
    }
    
    // Jika belum pernah setuju, tampilkan modal
    if (!hasAgreed) {
        // Gunakan setTimeout untuk memastikan DOM sudah siap
        setTimeout(initModal, 300);
    } else {
        // Jika sudah pernah setuju, hapus blur
        document.body.classList.remove('blurred');
    }
});
</script>
@endpush