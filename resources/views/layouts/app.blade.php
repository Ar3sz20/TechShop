<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Material Icons (Google) --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- Globális stílusok (minden oldalon kellenek) --}}
    <link rel="stylesheet" href="{{asset('css/apps.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/newsletter.css')}}">
    {{-- Oldal-specifikus stílusok --}}
    @stack('styles')
</head>

<body>

    {{--Navbar--}}
    <nav class="navbar">
        <div class="nav-left">
            <a href="/" class="logo">Techshop</a>
            <form action="{{ route('products.index') }}" method="GET"><input type="text" name="name" class="kereso" placeholder="Kereső..." value="{{ request('name') }}"></form>
            <div class="mobilscroll"></div>
        </div>
        <div class="nav-right">
            <button id="theme-toggle" class="nav-btn"><span class="material-icons">dark_mode</span></button>
            <div class="dropdown">
                <div class="select">
                    <p>Termékek</p>
                    <div class="nyilacska"></div>
                </div>
                <ul class="menu">
                    <li class="active">
                        <a href="{{ route('products.index') }}">Összes termék</a>
                    </li>
                    <li><a href="{{ route('products.index', ['category' => 'Smartproduct']) }}"
                            class="{{ request('category') == 'Smartproduct' ? 'active' : '' }}">Okos eszközök
                        </a></li>
                    <li> <a href="{{ route('products.index', ['category' => 'Household']) }}"
                            class="{{ request('category') == 'Household' ? 'active' : '' }}">Háztartás
                        </a></li>
                    <li><a href="{{ route('products.index', ['category' => 'Gaming']) }}"
                            class="{{ request('category') == 'Gaming' ? 'active' : '' }}">Gaming
                        </a></li>
                    <li><a href="{{ route('products.index', ['category' => 'Audio']) }}"
                            class="{{ request('category') == 'Audio' ? 'active' : '' }}">Audió eszközök
                        </a></li>
                    <li><a href="{{ route('products.index', ['category' => 'Accessories']) }}"
                            class="{{ request('category') == 'Accessories' ? 'active' : '' }}">Kiegészítők
                        </a></li>
                    <li><a href="{{ route('products.index', ['category' => 'Components']) }}"
                            class="{{ request('category') == 'Components' ? 'active' : '' }}">Alkatrészek
                        </a></li>
                </ul>
            </div>
            @guest
                <a href="{{ route('loginshow') }}" class="nav-btn">Bejelentkezés <span class="material-icons">person</span></a>
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

            <a href="{{route('cart')}}" class="nav-btn">Kosár <span class="material-icons">shopping_cart</span></a>
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
                <p>
                    <u>Kapcsolat:</u> <br>
                    Tel: +36 1 111 1111 <br>
                    Cím: Budapest, Lövőház u. 2-6, 1024 <br>
                    Email: info@techshop.hu <br>
                </p>
            </p>
        </div>
    </footer>
    {{--Footer End--}}


    <div class="overlay"></div>

    <div class="model">
        <div class="model-close-overlay"></div>
        <div class="model-content">
            <button class="model-close-btn">
                <span class="material-icons">close</span>
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

    {{-- Globális scriptek --}}
    <script src="{{ asset('js/navbardropdownmenu.js') }}"></script>
    <script src="{{ asset('js/newsletter.js') }}"></script>
    <script src="{{ asset('js/darkmode.js') }}"></script>
    {{-- Oldal-specifikus scriptek --}}
    @stack('scripts')
</body>

</html>