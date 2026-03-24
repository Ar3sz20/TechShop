@extends('layouts.app')

@section('content')

    <div class="product-detail-container">

        <div class="product-detail-card">

            <div class="product-image">
                <img src="{{ $product->image ? asset('kepek/' . $product->image) : asset('kepek/placeholder.png') }}" alt="{{ $product->name ?? 'Termék' }}">
            </div>

            <div class="product-info">
                <h1>{{ $product->name ?? 'Ultra Laptop' }}</h1>
                <p class="product-price"><strong>{{ $product->price ?? '300 000 Ft' }}</strong></p>

                <p class="product-stock {{ $product->quantity > 0 ? 'in-stock' : 'out-of-stock' }}">
                    {{ $product->quantity > 0 ? 'Raktáron: ' . $product->quantity . ' db' : 'Nincs készleten' }}
                </p>

                <p class="product-description">
                    {{ $product->description ?? 'Ez az Ultra Laptop egy csúcskategóriás készülék, amely tökéletes a munkára és a játékra is.' }}
                </p>

                <div class="product-actions">
                    @if($product->quantity > 0)
                        <a href="{{ route('cart.add', $product->id) }}" class="add-to-cart-btn">Kosárba 🛒</a>
                    @else
                        <button class="add-to-cart-btn disabled" disabled>Nem elérhető</button>
                    @endif
                    <a href="{{ url()->previous() }}" class="back-btn">Vissza</a>
                </div>
            </div>

        </div>

    </div>

@endsection