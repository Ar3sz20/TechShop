@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product-edit.css') }}">
@endpush

@section('content')

<div class="product-edit-wrapper">

    <h2 class="product-edit-title">✏️ Termék szerkesztése</h2>

    <a href="{{ route('products.index') }}" class="product-edit-back">
        ← Vissza
    </a>

    <form action="{{ route('products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="product-edit-form">

        @csrf
        @method('PUT')

        <div class="product-edit-row">
            <div class="product-edit-field">
                <label class="product-edit-label">Név</label>
                <input class="product-edit-input" type="text" name="name" value="{{ $product->name }}">
            </div>

            <div class="product-edit-field">
                <label class="product-edit-label">Ár</label>
                <input class="product-edit-input" type="number" name="price" value="{{ $product->price }}">
            </div>
        </div>

        <div class="product-edit-row">
            <div class="product-edit-field">
                <label class="product-edit-label">Mennyiség</label>
                <input class="product-edit-input" type="number" name="quantity" value="{{ $product->quantity }}">
            </div>

            <div class="product-edit-field">
                <label class="product-edit-label">Márka</label>
                <input class="product-edit-input" type="text" name="brandname" value="{{ $product->brandname }}">
            </div>
        </div>

        <div class="product-edit-row">
            <div class="product-edit-field">
                <label class="product-edit-label">Kategória</label>
                <input class="product-edit-input" type="text" name="category" value="{{ $product->category }}">
            </div>

            <div class="product-edit-field">
                <label class="product-edit-label">Típus</label>
                <input class="product-edit-input" type="text" name="type" value="{{ $product->type }}">
            </div>
        </div>

        <div class="product-edit-field">
            <label class="product-edit-label">Leírás</label>
            <textarea class="product-edit-textarea" name="description">{{ $product->description }}</textarea>
        </div>

        <div class="product-edit-field">
            <label class="product-edit-label">Jelenlegi kép</label>

            @if($product->image)
                <img class="product-edit-image"
                     src="{{ asset($product->image) }}"
                     alt="product image">
            @endif
        </div>

        <div class="product-edit-field">
            <label class="product-edit-label">Új kép</label>
            <input class="product-edit-input" type="file" name="image">
        </div>

        <button class="product-edit-btn" type="submit">
            💾 Mentés
        </button>

    </form>

</div>

@endsection