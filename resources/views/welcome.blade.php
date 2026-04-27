@extends("layouts.app")

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

                        <div class="banner-overlay"></div>

                        <div class="banner-content">
                            <span class="banner-badge">Üdvözlünk a TechShopban</span>

                            <h2 class="banner-title">A legjobb tech ajánlatok egy helyen</h2>

                            <p class="banner-text">
                                Válogass prémium laptopok, gaming gépek és kiegészítők között – gyors szállítással és
                                garanciával.
                            </p>

                            <div class="banner-actions">
                                <a href="{{ route('products.index') }}" class="banner-btn primary">
                                    Termékek felfedezése
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="{{ asset('images/banner2.png') }}" class="banner-img">

                        <div class="banner-overlay"></div>

                        <div class="banner-content">
                            <span class="banner-badge badge-sale">AKCIÓK HAMAROSAN</span>

                            <p class="banner-subtitle">Kövesd az újdonságokat</p>

                            <h2 class="banner-title">Nyári leárazás készülőben</h2>

                            <p class="banner-text">
                                Hamarosan érkeznek a legjobb ajánlatok gamer és tech termékekre.
                            </p>
                            <div class="banner-actions">
                                <a href="{{ route('products.index') }}" class="banner-btn primary">
                                    Összes termék
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="{{ asset('images/banner3.png') }}" class="banner-img">

                        <div class="banner-overlay"></div>

                        <div class="banner-content">
                            <span class="banner-badge badge-gaming">GAMING</span>

                            <p class="banner-subtitle">Teljesítmény</p>
                            <h2 class="banner-title">Erősebb setup. Jobb élmény.</h2>
                            <p class="banner-text">
                                Videókártyák, perifériák, high-end hardverek.
                            </p>

                            <div class="banner-actions">
                                <a href="/products?category=gaming" class="banner-btn primary">
                                    Gaming termékek
                                </a>
                            </div>
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
                            <span class="price">{{ number_format($product->price, 2, ",") }} $</span>

                            <div class="product-actions">
                                <a href="{{ route('products.show', $product->id) }}" class="view-btn">Megnézem</a>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="cart-btn">Kosárba <span
                                            class="material-icons">add_shopping_cart</span></button>
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