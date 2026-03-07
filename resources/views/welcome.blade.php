@extends("layouts.app")

@section('content')
    <div class="main-main">
        <div class="banner">
            <div class="container-banner">
                <div class="slider-container">
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
            </div>
        </div>

        <div class="products-section">
            <h2>Népszerű termékek</h2>
            <div class="products-grid">
                <div class="product-card">
                    <img src="{{ asset('kepek/placeholder.png') }}" alt="Laptop">
                    <h3>Ultra Laptop</h3>
                    <p>Akár 20% kedvezmény!</p>
                    <button>Megnézem</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('kepek/placeholder.png') }}" alt="Telefon">
                    <h3>Okostelefon Pro</h3>
                    <p>Most akciós ár!</p>
                    <button>Megnézem</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('kepek/placeholder.png') }}" alt="Gaming">
                    <h3>Gamer felszerelés</h3>
                    <p>Limitált kiadás!</p>
                    <button>Megnézem</button>
                </div>
            </div>
        </div>

        <div class="offers-section">
            <h2>Különleges akciók</h2>
            <div class="offers-grid">
                <div class="offer-card">
                    <h3>Black Friday akció!</h3>
                    <p>Akár 50% kedvezmény a laptopokra</p>
                </div>
                <div class="offer-card">
                    <h3>Új termékek</h3>
                    <p>Próbáld ki az új gamer perifériákat</p>
                </div>
            </div>
        </div>
@endsection