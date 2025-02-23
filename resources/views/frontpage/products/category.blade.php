@extends('layouts.front')

@section('title', 'Prescription Product - Meiji Indonesia')

@section('content')
    <!-- Modal untuk kategori yang memerlukan validasi -->
    @if (isset($show_modal) && $show_modal)
        <div id="validateModal" style="display: block; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);">
            <div style="background-color: #fff; margin: 15% auto; padding: 20px; width: 40%; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                    <h5>Category Validation</h5>
                    <button id="closeModal" style="font-size: 24px; color: #aaa; border: none; background: transparent; cursor: pointer;">×</button>
                </div>
                <div style="padding: 10px 0;">
                    <p>Select your background to view relevant products:</p>
                    <button id="doctorBtn" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Doctor</button>
                    <button id="apotekerBtn" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Apoteker</button>
                </div>

                <div id="categoryValidationMessage" style="padding-top: 20px; display: none;">
                    <p>This category requires validation before you can view the products.</p>
                    <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                        <button id="closeModal" style="padding: 5px 10px; background-color: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer;">Close</button>
                        <a href="{{ route('frontpage.category.validate', ['lang' => app()->getLocale(), 'slug' => $category->getTranslation('slug', app()->getLocale())]) }}" style="padding: 5px 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">Validate Now</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Produk yang hanya akan ditampilkan setelah validasi -->
    <section class="shop" id="shop">
        <div class="container">
            <div class="row" id="productList">
                @if(isset($products) && $products->count() > 0)
                    @foreach ($products as $item)
                        <div class="col-12 col-md-6 col-lg-4 product-item" data-hover="">
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="Product" style="width: 200px; height: 200px; object-fit: cover;"/>
                                <a class="add-to-cart" href="{{ route('frontpage.products.show', [
                                    'lang' => app()->getLocale(),
                                    'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                    'products_slug' => $item->getTranslation('slug', app()->getLocale())
                                ]) }}">{{ translate('Read More') }}</a>
                                <div class="badge"></div>
                            </div>
                            <div class="product-content">
                                <div class="product-title"><a href="shop-single.html">{{ $item->getTranslation('name', app()->getLocale()) }}</a></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No products available for this category.</p>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('validateModal');
            var productList = document.getElementById('productList');
            var categoryValidationMessage = document.getElementById('categoryValidationMessage');

            // Menyembunyikan produk dan menampilkan modal
            modal.style.display = 'block';
            productList.style.display = 'none';  // Sembunyikan produk

            // Menutup modal dan menampilkan kembali produk
            document.getElementById('closeModal').addEventListener('click', function() {
                modal.style.display = 'none';  // Menyembunyikan modal
                productList.style.display = 'block';  // Menampilkan produk
            });

            // Ketika tombol Doctor ditekan
            document.getElementById('doctorBtn').addEventListener('click', function() {
                categoryValidationMessage.style.display = 'block';  // Tampilkan pesan validasi
                productList.style.display = 'none';  // Sembunyikan produk
            });

            // Ketika tombol Apoteker ditekan
            document.getElementById('apotekerBtn').addEventListener('click', function() {
                categoryValidationMessage.style.display = 'block';  // Tampilkan pesan validasi
                productList.style.display = 'none';  // Sembunyikan produk
            });
        });
    </script>
@endpush
