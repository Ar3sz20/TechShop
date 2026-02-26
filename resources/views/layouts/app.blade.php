<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link rel="stylesheet" href="{{asset('css/apps.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/logreg.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
</head>

<body>
    {{--Navbar--}}
    <nav class="navbar">
        <div class="nav-left">
            <a href="/" class="logo">Techshop</a>
            <input type="text" class="kereso" placeholder="Kereső...">
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
                    <li><a href="{{ route('products.index', ['category' => 'smartproduct']) }}" +
                            class="{{ request('category') == 'smartproduct' ? 'active' : '' }}">Okos eszközök
                        </a></li>
                    <li> <a href="{{ route('products.index', ['category' => 'household']) }}" +
                            class="{{ request('category') == 'household' ? 'active' : '' }}">Háztartás
                        </a></li>
                    <li><a href="{{ route('products.index', ['category' => 'gaming']) }}" +
                            class="{{ request('category') == 'gaming' ? 'active' : '' }}">Gaming
                        </a></li>
                </ul>
            </div>

            <a href="{{ route('loginshow') }}">Bejelentkezés</a>

            {{-- <a href="{{route('auth')}}" class="nav-btn">👤</a>--}}
            <a href="{{route('cart')}}" class="nav-btn">🛒</a> 
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

    <script src="{{ asset('js/loginform.js') }}"></script>
    <script src="{{ asset('js/navbardropdownmenu.js') }}"></script>
</body>

</html>