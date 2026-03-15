@extends('layouts.app')

@section('content')
    <div class="cart-container">
        <h1>🛒 Kosár</h1>

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
                        @php $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal; @endphp
                        <tr>
                            <td data-label="Termék">
                                <div class="cart-product-info">
                                    <img src="{{ $item['image'] ? asset('kepek/' . $item['image']) : asset('kepek/placeholder.png') }}"
                                        alt="{{ $item['name'] }}" class="cart-product-img">
                                    <span>{{ $item['name'] }}</span>
                                </div>
                            </td>
                            <td data-label="Darab">
                                <div class="quantity-control">
                                    <form action="{{ route('cart.decrease', $id) }}" method="POST" class="quantity-btn-form">
                                        @csrf
                                        <button type="submit" class="qty-btn">-</button>
                                    </form>
                                    <span class="qty-number">{{ $item['quantity'] }}</span>
                                    <form action="{{ route('cart.increase', $id) }}" method="POST" class="quantity-btn-form">
                                        @csrf
                                        <button type="submit" class="qty-btn">+</button>
                                    </form>
                                </div>
                            </td>
                            <td data-label="Ár">{{ number_format($item['price'], 0, ",", " ") }} $</td>
                            <td data-label="Összesen">{{ number_format($subtotal, 0, ",", " ") }} $</td>
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
                <p>Összesen: <strong>{{ number_format($total, 0, ",", " ") }} $</strong></p>
                <button class="checkout-btn">Megrendelés</button>
            </div>

        @else
            <p style="text-align:center; font-size:1.2rem; margin-top:20px;">A kosarad üres!</p>
        @endif
    </div>
@endsection