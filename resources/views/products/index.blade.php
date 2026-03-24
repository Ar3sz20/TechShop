@extends('layouts.app')

@section('content')
<div class="main-main">

    <div class="products-page-wrapper">

        <aside class="filters-sidebar">
            <h3>Szűrők</h3>
            <form method="GET" action="{{ route('products.index') }}">
                <label>Kategória:</label>
                <select name="category">
                    <option value="">Összes kategória</option>
                    <option value="smartproduct" {{ request('category') == 'smartproduct' ? 'selected' : '' }}>Okos eszközök</option>
                    <option value="household" {{ request('category') == 'household' ? 'selected' : '' }}>Háztartási</option>
                    <option value="gaming" {{ request('category') == 'gaming' ? 'selected' : '' }}>Gaming</option>
                </select>

                <label>Típus:</label>
                <select name="type">
                    <option value="">Összes típus</option>
                    <option value="gaming" {{ request('type') == 'gaming' ? 'selected' : '' }}>Gaming</option>
                    <option value="office" {{ request('type') == 'office' ? 'selected' : '' }}>Office</option>
                </select>

                <label>Min ár:</label>
                <input type="number" name="min_price" placeholder="Min ár" value="{{ request('min_price') }}">

                <label>Max ár:</label>
                <input type="number" name="max_price" placeholder="Max ár" value="{{ request('max_price') }}">

                <button type="submit" class="filter-btn">Szűrés</button>
            </form>
        </aside>

        <div class="products-section">
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ $product->image ? asset('kepek/' . $product->image) : asset('kepek/placeholder.png') }}"
                                 alt="{{ $product->name }}">
                        </div>

                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <span class="price">{{ number_format($product->price, 0, ",", " ") }} $</span>

                            <div class="product-actions">
                                <a href="{{ route('products.show', $product->id) }}" class="view-btn">Megnézem</a>
                                <a href="{{ route('cart.add', $product->id) }}" class="cart-btn">Kosárba 🛒</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection