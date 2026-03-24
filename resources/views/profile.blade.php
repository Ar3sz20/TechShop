@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endpush

@push('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endpush

@section('content')
@if(session('success'))
    <div class="alert-success" style="padding:10px; margin-bottom:15px; background-color:#d4edda; color:#155724; border-radius:5px;">
        {{ session('success') }}
    </div>
@endif
<div class="profile-container">

    <div class="profile">
        <div class="profile-header">
            <img src="{{ $user->avatar ?? asset('images/default-profile.png') }}" alt="profile img" class="profile-img">
            <div class="profile-text-container">
                <h1 class="profile-title">{{ $user->name }}</h1>
                <p class="profile-email">{{ $user->email }}</p>
            </div>
        </div>

        <div class="profile-menu">
            <button class="profile-menu-link active" data-section="account">Fiók</button>
            <button class="profile-menu-link" data-section="orders">Előző rendelések</button>
            <button class="profile-menu-link" data-section="notifications">Értesítések</button>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="profile-menu-link">Kijelentkezés</button>
            </form>
        </div>
    </div>

    <div class="account">
        <div id="account" class="account-section">
            <h2>Fiók beállítások</h2>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="account-edit">
                    <div class="account-input-container">
                        <label>Profil név:</label>
                        <input type="text" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="account-input-container">
                        <label>Email cím:</label>
                        <input type="email" name="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="account-edit">
                    <div class="account-input-container">
                        <label>Telefonszám:</label>
                        <input type="text" name="phone" value="{{ $user->phone ?? '' }}">
                    </div>
                    <div class="account-input-container">
                        <label>Cím:</label>
                        <input type="text" name="address" value="{{ $user->address ?? '' }}">
                    </div>
                </div>
                <button type="submit" class="account-btn-save">Mentés</button>
            </form>
        </div>

        <div id="orders" class="account-section" style="display:none;">
            <h2>Előző rendelések</h2>
            @if($user->orders->count() > 0)
                {{-- Rendelési előzmények táblázat --}}
                <table>
                    <thead>
                        <tr>
                            <th>Rendelés #</th>
                            <th>Dátum</th>
                            <th>Összeg</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->orders()->latest()->get() as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at->format('Y.m.d H:i') }}</td>
                                <td>{{ number_format($order->total_price, 0, ",", " ") }} $</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Még nincs rendelésed.</p>
            @endif
        </div>

        <div id="notifications" class="account-section" style="display:none;">
            <h2>Értesítések</h2>
            <form action="{{ route('profile.updateNewsletter') }}" method="POST">
                @csrf
                @method('PUT')
                <label class="profile-checkbox-label">
                    <input type="checkbox" name="newsletter" value="1" {{ $user->newsletter ?? false ? 'checked' : '' }}>
                    Feliratkozás hírlevélre
                </label>
                <div style="margin-top:15px;">
                    <button type="submit" class="account-btn-save">Mentés</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection