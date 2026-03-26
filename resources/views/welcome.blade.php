@extends("layouts.app")

{{-- Főoldal: banner + termék stílusok --}}
@push('styles')
    <link rel="stylesheet" href="{{asset('css/banner.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
@endpush

@push('scripts')
    <script src="{{ asset('js/slider.js') }}"></script>
@endpush

@section('content')
    <div class="main-main">
        <div class="banner">
            <div class="container-banner">
                <button class="slider-btn prev">&#10094;</button>
                <div class="slider-track">
                    <div class="slider-item">
                        <img src="{{ asset('images/banner.png') }}" alt="Üdvözlünk a TechShopunkban" class="banner-img">

                        <div class="banner-content">
                            <p class="banner-subtitle">Üdvözlünk a TechShopunkban</p>
                            <h2 class="banner-title">Nem tudom</h2>
                            <p class="banner-text">
                                Akciók és stb-ik
                            </p>
                            <a href="#" class="banner-btn">Körbe nézek</a>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="{{ asset('images/banner.png') }}" alt="Üdvözlünk a TechShopunkban" class="banner-img">

                        <div class="banner-content">
                            <p class="banner-subtitle">Üdvözlünk a TechShopunkban</p>
                            <h2 class="banner-title">Nem tudom</h2>
                            <p class="banner-text">
                                Akciók és stb-ik
                            </p>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="{{ asset('images/banner.png') }}" alt="Üdvözlünk a TechShopunkban" class="banner-img">

                        <div class="banner-content">
                            <p class="banner-subtitle">Üdvözlünk a TechShopunkban</p>
                            <h2 class="banner-title">Nem tudom</h2>
                            <p class="banner-text">
                                Akciók és stb-ik
                            </p>
                        </div>
                    </div>
                </div>
                <button class="slider-btn next">&#10095;</button>
            </div>
        </div>

        <div class="products-section">
            <h2 class="section-title">Ajánlott termékek</h2>

            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ $product->image ? asset($product->image) : asset('images/products/placeholder.png') }}"
                                alt="{{ $product->name }}">
                        </div>

                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <span class="price">{{ number_format($product->price,2,",") }} $</span>

                            <div class="product-actions">
                                <a href="{{ route('products.show', $product->id) }}" class="view-btn">Megnézem</a>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="cart-btn">Kosárba 🛒</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="all-products-btn">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Összes termék</a>
            </div>
        </div>
    </div>
@endsection