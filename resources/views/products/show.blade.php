@extends('layouts.app')

@section('content')

<div class="product-detail-container">

    <div class="product-detail-card">


<div class="product-detail-container">

    <div class="product-detail-card">

        <div class="product-image">
            <img src="{{ asset('kepek/laptop.png') }}" alt="Ultra Laptop">
        </div>

        <div class="product-info">
            <h1>Ultra Laptop</h1>
            <p class="product-price"><strong>300 000 Ft</strong></p>
            <p class="product-description">
                Ez az Ultra Laptop egy csúcskategóriás készülék, amely tökéletes a munkára és a játékra is.
                16 GB RAM, 1 TB SSD és legújabb processzor található benne. Ideális választás mindenkinek, aki a teljesítményt szereti.
            </p>

            <div class="product-actions">
                <button class="add-to-cart-btn">Kosárba</button>
            </div>
        </div>

    </div>

</div>
@endsection
