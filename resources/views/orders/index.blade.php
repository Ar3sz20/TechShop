@extends('layouts.app')

{{-- Rendelések oldal: a kosár stílusokat használja a táblázathoz --}}
@push('styles')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endpush

@section('content')
<div class="cart-container">
    <h1>📦 Rendeléseim</h1>

    @if(session('success'))
        <div class="alert-success" style="padding:10px; margin-bottom:15px; background-color:#d4edda; color:#155724; border-radius:5px;">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->count() > 0)
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Rendelés #</th>
                    <th>Dátum</th>
                    <th>Összeg</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td data-label="Rendelés #">{{ $order->id }}</td>
                        <td data-label="Dátum">{{ $order->created_at->format('Y.m.d H:i') }}</td>
                        <td data-label="Összeg">{{ number_format($order->total_price, 0, ",", " ") }} $</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align:center; font-size:1.2rem; margin-top:20px;">Még nincs rendelésed!</p>
    @endif
</div>
@endsection
