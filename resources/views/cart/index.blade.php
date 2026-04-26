@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@section('content')

    @php
        $user = auth()->user();
        $address = explode(';', $user->address ?? '');
    @endphp

    <div class="cart-container">
        <h1><span class="material-icons">shopping_cart</span> Kosár</h1>

        @if(count($cart) > 0)

            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Termék</th>
                        <th>Darab</th>
                        <th>Ár</th>
                        <th>Összesen</th>
                        <th>Művelet</th>
                    </tr>
                </thead>

                <tbody>
                    @php $total = 0; @endphp

                    @foreach($cart as $id => $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp

                        <tr>
                            <td data-label="Termék">
                                <div class="cart-product-info">
                                    <img class="cart-product-img" src="{{ asset($item['image']) }}">
                                    <span>{{ $item['name'] }}</span>
                                </div>
                            </td>

                            <td data-label="Darab">
                                <div class="quantity-control">
                                    <form action="{{ route('cart.decrease', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="qty-btn">-</button>
                                    </form>

                                    <span class="qty-number">{{ $item['quantity'] }}</span>

                                    <form action="{{ route('cart.increase', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="qty-btn">+</button>
                                    </form>
                                </div>
                            </td>

                            <td data-label="Ár">
                                {{ number_format($item['price'], 2, ",") }} $
                            </td>

                            <td data-label="Összesen">
                                {{ number_format($subtotal, 2, ",") }} $
                            </td>

                            <td data-label="Művelet">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button class="remove-btn">Törlés</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="cart-summary">
                <p>Összesen: <strong>{{ number_format($total, 2, ",") }} $</strong></p>

                @auth
                    <button type="button" class="checkout-open-btn" id="openCheckout">
                        Rendelés leadása <span class="material-icons">shopping_cart_checkout</span>
                    </button>
                @endauth

                @guest
                    <a href="{{ route('loginshow') }}" class="btn-login-to-cart">
                        Jelentkezz be a rendeléshez
                    </a>
                @endguest
            </div>

        @else
            <p class="cart-empty">A kosarad üres!</p>
        @endif
    </div>

    <div class="checkout-overlay" id="checkoutModal">

        <div class="checkout-shell">

            <div class="checkout-left">

                <h2 class="checkout-title"><span class="material-icons">receipt_long</span> Rendelés véglegesítése</h2>
                <p class="checkout-subtitle">Ellenőrizd az adataid és fejezd be a rendelést</p>

                <form action="{{ route('orders.store') }}" method="POST" class="checkout-form">
                    @csrf

                    <div class="checkout-section">
                        <h3><span class="material-icons">person</span> Személyes adatok</h3>

                        <label>Név</label>
                        <input type="text" name="full_name" value="{{ old('full_name', $user->name ?? '') }}" required>

                        <label>Telefonszám</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}" required>
                        <label class="company-toggle">

                            <label class="payment-card company-switch">
                                <span>Céges vásárlás</span>
                                <input type="checkbox" id="isCompany" name="is_company">
                            </label>

                            <div id="companyFields" class="company-box">
                                <h4>Számlázási adatok</h4>

                                <input type="text" name="company_name" placeholder="Cégnév">

                                <input type="text" name="tax_number" placeholder="Adószám (12345678-1-42)">
                            </div>
                    </div>

                    <div class="checkout-section">
                        <h3><span class="material-icons">local_shipping</span> Szállítási cím</h3>

                        <div class="checkout-grid">

                            <input type="text" name="postal_code" value="{{ old('postal_code', $address[0] ?? '') }}"
                                placeholder="Irányítószám" required>

                            <input type="text" name="city" value="{{ old('city', $address[1] ?? '') }}" placeholder="Város"
                                required>

                            <input type="text" name="street" value="{{ old('street', $address[2] ?? '') }}"
                                placeholder="Utca" required>

                            <input type="text" name="house_number" value="{{ old('house_number', $address[3] ?? '') }}"
                                placeholder="Házszám" required>

                            <input type="text" name="floor" value="{{ old('floor', $address[4] ?? '') }}"
                                placeholder="Emelet / ajtó">

                        </div>
                    </div>

                    <div class="checkout-section">
                        <h3><span class="material-icons">payments</span> Fizetés</h3>

                        <label class="payment-card">
                            <input type="radio" name="payment_method" value="utanvet" checked>
                            <span><span class="material-icons">payments</span> Utánvét</span>
                        </label>

                        <label class="payment-card">
                            <input type="radio" name="payment_method" value="utalas">
                            <span><span class="material-icons">credit_card</span> Utalás</span>
                        </label>
                    </div>

                    <button type="submit" class="checkout-pay-btn">
                        Rendelés leadása <span class="material-icons">shopping_cart_checkout</span>
                    </button>

                </form>

            </div>

            <div class="checkout-right">

                <h3><span class="material-icons">shopping_cart</span> Kosár összesítő</h3>

                <div class="checkout-items">

                    @php $total = 0; @endphp

                    @foreach($cart as $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp

                        <div class="checkout-item">
                            <img src="{{ asset($item['image']) }}">
                            <div>
                                <p>{{ $item['name'] }}</p>
                                <small>{{ $item['quantity'] }}x</small>
                            </div>
                            <span>{{ number_format($subtotal, 2, ",") }} $</span>
                        </div>
                    @endforeach

                </div>

                <div class="checkout-total">
                    <span>Összesen:</span>
                    <strong>{{ number_format($total, 2, ",") }} $</strong>
                </div>

            </div>

            <button id="closeCheckout" class="checkout-close"><span class="material-icons">close</span></button>

        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/cart.js') }}"></script>
@endpush