@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
@endpush

@section('content')
<div class="main-main">

    <div class="products-page-wrapper">

        <aside class="filters-sidebar">
            <h3>Szűrők</h3>
            <form method="GET" action="{{ route('products.index') }}">
                <label>Kategória:</label>
                <select name="category">
                    <option value="">Összes kategória</option>
                    <option value="Smartproduct" {{ request('category') == 'Smartproduct' ? 'selected' : '' }}>Okos eszközök</option>
                    <option value="Household" {{ request('category') == 'Household' ? 'selected' : '' }}>Háztartási</option>
                    <option value="Gaming" {{ request('category') == 'Gaming' ? 'selected' : '' }}>Gaming</option>
                    <option value="Audio" {{ request('category') == 'Audio' ? 'selected' : '' }}>Audió eszközök</option>
                    <option value="Accessories" {{ request('category') == 'Accessories' ? 'selected' : '' }}>Kiegészítők</option>
                    <option value="Components" {{ request('category') == 'Components' ? 'selected' : '' }}>Alkatrészek</option>
                </select>
                <label>Típus:</label>
                @if(request('category') == 'Smartproduct')
                    <select name="type">
                        <option value="" {{ request('type') == '' ? 'selected' : '' }}>Válaszon típust</option>
                        <option value="Phone" {{ request('type') == 'Phone' ? 'selected' : '' }}>Telefonok</option>
                        <option value="Laptop" {{ request('type') == 'Laptop' ? 'selected' : '' }}>Laptopok</option>
                    </select>
                @elseif (request('category') == 'Gaming')
                    <select name="type">
                        <option value="" {{ request('type') == '' ? 'selected' : '' }}>Válaszon típust</option>
                        <option value="Console" {{ request('type') == 'Console' ? 'selected' : '' }}>Konzolok</option>
                        <option value="HandholdConsole" {{ request('type') == 'HandholdConsole' ? 'selected' : '' }}>Kézi konzolok</option>
                        <option value="VR" {{ request('type') == 'VR' ? 'selected' : '' }}>VR eszközök</option>
                        <option value="Controller" {{ request('type') == 'Controller' ? 'selected' : '' }}>Kontrollerek</option>
                    </select>
                @elseif (request('category') == 'Components')
                    <select name="type">
                        <option value="" {{ request('type') == '' ? 'selected' : '' }}>Válaszon típust</option>
                        <option value="GPU" {{ request('type') == 'GPU' ? 'selected' : '' }}>Grafikus kártyák</option>
                        <option value="CPU" {{ request('type') == 'CPU' ? 'selected' : '' }}>Proceszorok</option>
                        <option value="Storage" {{ request('type') == 'Storage' ? 'selected' : '' }}>Tárhelyek</option>
                        <option value="RAM" {{ request('type') == 'RAM' ? 'selected' : '' }}>Memória</option>
                    </select>
                @elseif (request('category') == 'Accessories')
                    <select name="type">
                        <option value="" {{ request('type') == '' ? 'selected' : '' }}>Válaszon típust</option>
                        <option value="Mouse" {{ request('type') == 'Mouse' ? 'selected' : '' }}>Egerek</option>
                        <option value="Keyboard" {{ request('type') == 'Keyboard' ? 'selected' : '' }}>Billentyűzetek</option>
                        <option value="Charger" {{ request('type') == 'Charger' ? 'selected' : '' }}>Töltők</option>
                        <option value="Webcam" {{ request('type') == 'Webcam' ? 'selected' : '' }}>Web kamerák</option>
                        <option value="Mousepad" {{ request('type') == 'Mousepad' ? 'selected' : '' }}>Egérpadok</option>
                    </select>
                @elseif (request('category') == 'Household')
                    <select name="type">
                        <option value="" {{ request('type') == '' ? 'selected' : '' }}>Válaszon típust</option>
                        <option value="Television" {{ request('type') == 'Television' ? 'selected' : '' }}>Televizíók</option>
                        <option value="WashingMachine" {{ request('type') == 'WashingMachine' ? 'selected' : '' }}>Mosógépek</option>
                        <option value="Refrigerator" {{ request('type') == 'Refrigerator' ? 'selected' : '' }}>Hűtőszekrények</option>
                        <option value="Oven" {{ request('type') == 'Oven' ? 'selected' : '' }}>Sütők</option>
                        <option value="VacuumCleaner" {{ request('type') == 'VacuumCleaner' ? 'selected' : '' }}>Porszívók</option>
                    </select>
                    
                @elseif (request('category') == 'Audio')
                    <select name="type">
                        <option value="" {{ request('type') == '' ? 'selected' : '' }}>Válaszon típust</option>
                        <option value="Headphone" {{ request('type') == 'Headphone' ? 'selected' : '' }}>Fejhalgatók</option>
                        <option value="Earphone" {{ request('type') == 'Earphone' ? 'selected' : '' }}>Fülhalgatók</option>
                        <option value="Speaker" {{ request('type') == 'Speaker' ? 'selected' : '' }}>Hangszorók</option>
                    </select>

                @endif
                

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
                            <img src="{{ $product->image ? asset($product->image) : asset('images/products/placeholder.png') }}"
                                 alt="{{ $product->name }}">
                        </div>

                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <span class="price">{{ number_format($product->price,2,",") }} $</span>

                            <div class="product-actions">
                                <a href="{{ route('products.show', $product->id) }}" class="view-btn">Megnézem</a>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="cart-btn">Kosárba 🛒</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection