@extends('layouts.front')

@section('title')
  {{ $product->getTranslation('name', app()->getLocale()) ?? 'News Detail' }}
@endsection

@push('css')
<style>
.blur-section {
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
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
<section class="single-product blur-section" id="single-product">
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
      // Tampilkan modal saat halaman dimuat
      var disclaimerModal = new bootstrap.Modal(document.getElementById('disclaimerModal'), {
          backdrop: 'static' // This prevents closing modal when clicking outside
      });
      
      // Apply blur class to the relevant section
      document.getElementById('single-product').classList.add('blur-section');
      
      // Tampilkan modal saat halaman dimuat
      disclaimerModal.show();
      
      // Cek apakah sudah pernah setuju sebelumnya (opsional)
      var hasAgreed = localStorage.getItem('disclaimerAgreed');
      if (hasAgreed) {
          // Jika sudah pernah setuju, tidak perlu menampilkan modal
          disclaimerModal.hide();
          // Remove blur effect
          document.getElementById('single-product').classList.remove('blur-section');
      }
      
      // Ketika tombol agree diklik, simpan status di localStorage dan hapus blur
      document.getElementById('agreeButton').addEventListener('click', function() {
          localStorage.setItem('disclaimerAgreed', 'true');
          // Remove blur effect when agree is clicked
          document.getElementById('single-product').classList.remove('blur-section');
      });
  });
</script>
@endpush