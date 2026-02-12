@extends('layouts.app')

@section('content')
    <form method="GET" action="{{ route('products.index') }}">
    
        <select name="category">
            <option value="">Összes kategória</option>
            <option value="smartproducts">Okos eszközök</option>
            <option value="household">Háztartási</option>
            <option value="gaming">Gaming</option>
        </select>

        <input type="number" name="min_price" placeholder="Min ár">
        <input type="number" name="max_price" placeholder="Max ár">

        <button type="submit">Szűrés</button>
    </form>

    <div class="all-products-grid">
        @foreach($products as $product)
            <div class="product-card">
                <img src="{{ asset('kepek/' . $product->image) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p><strong>${{ number_format($product->price,2) }} USD</strong></p>
                <button>Megnézem</button>
            </div>
        @endforeach
    </div>


</div>
@endsection
