<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/apps.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/logreg.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <link rel="stylesheet" href="{{asset('css/newsletter.css')}}">
    <link rel="stylesheet" href="{{asset('css/banner.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
</head>

<body>

    {{--Navbar--}}
    <nav class="navbar">
        <div class="nav-left">
            <a href="/" class="logo">Techshop</a>
            <input type="text" class="kereso" placeholder="Kereső...">
            <div class="mobilscroll"></div>
        </div>
        <div class="nav-right">
            <div class="dropdown">
                <div class="select">
                    <p>Termékek</p>
                    <div class="nyilacska"></div>
                </div>
                <ul class="menu">
                    <li class="active">
                        <a href="{{ route('products.index') }}">Összes termék</a>
                    </li>
                    <li><a href="{{ route('products.index', ['category' => 'smartproduct']) }}"
                            class="{{ request('category') == 'smartproduct' ? 'active' : '' }}">Okos eszközök
                        </a></li>
                    <li> <a href="{{ route('products.index', ['category' => 'household']) }}"
                            class="{{ request('category') == 'household' ? 'active' : '' }}">Háztartás
                        </a></li>
                    <li><a href="{{ route('products.index', ['category' => 'gaming']) }}"
                            class="{{ request('category') == 'gaming' ? 'active' : '' }}">Gaming
                        </a></li>
                </ul>
            </div>
            @guest
                <a href="{{ route('loginshow') }}">Bejelentkezés👤</a>
            @endguest

            @auth
                <div class="dropdown">
                    <div class="select">
                        <p>{{ auth()->user()->name }}</p>
                        <div class="nyilacska"></div>
                    </div>
                    <ul class="menu">
                        <li><a href="{{ route('profile.show') }}">Profil</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-btn">Kijelentkezés</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth

            <a href="{{route('cart')}}" class="nav-btn">Kosár🛒</a>
        </div>
    </nav>
    {{--Navbar End--}}

    <main class="page-content">
        @yield('content')
    </main>


    {{--Footer--}}
    <footer class="footer">
        <div class="footer-content">
            <p>© 2026 TechShop - Minden jog fenntartva</p>
            <p>
                <a href="#" class="footer-link">Impresszum</a>
                <a href="#" class="footer-link">Adatvédelem</a>
                <a href="#" class="footer-link">Kapcsolat</a>
            </p>
        </div>
    </footer>
    {{--Footer End--}}


    <div class="overlay"></div>

    <div class="model">
        <div class="model-close-overlay"></div>
        <div class="model-content">
            <button class="model-close-btn">
                ❌
            </button>
            <div class="newsletter-img">
                <img src="{{ asset('images/newsletter.png') }}" alt="subscribe newsletter" width="400" height="400">
            </div>

            <div class="newsletter">
                <form action="/newsletter" method="POST">
                    @csrf
                    <div class="newsletter-header">
                        <h3 class="newsletter-title">Iratkozz fel hírlevelünkre!</h3>
                        <p class="newsletter-desc">
                            Ha szeretnél kedvezményeket, limitált termékekről információkat kapni iratkozz fel
                            hírlevünkre
                        </p>
                    </div>
                    <input type="email" name="email" class="email-field" placeholder="Email cím" required>
                    <button type="submit" class="btn-newsletter">Felíratkozás</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/loginform.js') }}"></script>
    <script src="{{ asset('js/navbardropdownmenu.js') }}"></script>
    <script src="{{ asset('js/newsletter.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
</body>

</html>