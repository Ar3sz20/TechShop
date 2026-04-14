@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endpush

@push('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endpush

@section('content')
    @if(session('success'))
        <div id="success-alert" class="alert-success"
            style="padding:10px; margin-bottom:15px; background-color:#d4edda; color:#155724; border-radius:5px;">
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
                @auth
                    @if(auth()->user()->role === 1)
                        <button class="profile-menu-link" data-section="admin">Admin panel</button>
                    @endif
                @endauth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="profile-menu-link">Kijelentkezés</button>
                </form>
            </div>
        </div>

        <div class="account">
            <div id="account" class="account-section active">
                <h2>Fiók beállítások</h2>

                @php
                    $address = explode(';', $user->address ?? '');
                @endphp

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
                    </div>

                    <h3 style="margin-top:20px;">🚚 Szállítási cím</h3>

                    <div class="account-edit">
                        <div class="account-input-container">
                            <label>Irányítószám:</label>
                            <input type="text" name="postal_code" value="{{ $address[0] ?? '' }}">
                        </div>

                        <div class="account-input-container">
                            <label>Város:</label>
                            <input type="text" name="city" value="{{ $address[1] ?? '' }}">
                        </div>
                    </div>

                    <div class="account-edit">
                        <div class="account-input-container">
                            <label>Utca:</label>
                            <input type="text" name="street" value="{{ $address[2] ?? '' }}">
                        </div>

                        <div class="account-input-container">
                            <label>Házszám:</label>
                            <input type="text" name="house_number" value="{{ $address[3] ?? '' }}">
                        </div>
                    </div>

                    <div class="account-edit">
                        <div class="account-input-container">
                            <label>Emelet / ajtó:</label>
                            <input type="text" name="floor" value="{{ $address[4] ?? '' }}">
                        </div>
                    </div>

                    <button type="submit" class="account-btn-save">
                        Mentés
                    </button>
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
                                    <td>{{ number_format($order->total_price, 2, ",") }} $</td>
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

            {{-- Admin panel csak adminoknak --}}
            @if(auth()->user()->role === 1)

                <div id="admin" class="account-section admin-panel" style="display:none;">

                    <div class="admin-header">
                        <h2>🛠 Admin panel</h2>
                        <p>Termékek kezelése és adminisztráció</p>
                    </div>

                    <!-- ÚJ TERMÉK -->
                    <div class="admin-card">
                        <h3>➕ Új termék hozzáadása</h3>

                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="account-edit">
                                <div class="account-input-container">
                                    <label>Termék neve</label>
                                    <input type="text" name="name" required>
                                </div>

                                <div class="account-input-container">
                                    <label>Ár</label>
                                    <input type="number" name="price" step="0.01" required>
                                </div>
                            </div>

                            <div class="account-edit">
                                <div class="account-input-container">
                                    <label>Kép</label>
                                    <input type="file" name="image">
                                </div>

                                <div class="account-input-container">
                                    <label>Darabszám</label>
                                    <input type="number" name="quantity" min="0" required>
                                </div>
                            </div>

                            <div class="account-edit">
                                <div class="account-input-container">
                                    <label>Kategória</label>
                                    <select name="category_id" required>
                                        <option value="">-- Válassz --</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->category }}">
                                                {{ $product->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="account-input-container">
                                    <label>Márka</label>
                                    <input type="text" name="brandname">
                                </div>

                                <div class="account-input-container">
                                    <label>Típus</label>
                                    <select name="type_id" required>
                                        <option value="">-- Válassz --</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->type }}">
                                                {{ $product->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="account-input-container">
                                <label>Leírás</label>
                                <textarea name="description"></textarea>
                            </div>

                            <button type="submit" class="account-btn-save">Hozzáadás</button>
                        </form>
                    </div>

                    <!-- TERMÉKEK LISTÁJA -->
                    <div class="admin-card">
                        <h3>📦 Termékek</h3>

                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Név</th>
                                    <th>Ár</th>
                                    <th>Mennyiség</th>
                                    <th>Műveletek</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td data-label="ID">{{ $product->id }}</td>
                                        <td data-label="Név">{{ $product->name }}</td>
                                        <td data-label="Ár">{{ number_format($product->price, 2, ",") }} $</td>
                                        <td data-label="Mennyiség">{{ $product->quantity }}</td>

                                        <td data-label="Műveletek">
                                            <div class="account-action">
                                                <a href="{{ route('products.edit', $product->id) }}" class="account-btn-edit">
                                                    Módosítás
                                                </a>

                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="account-btn-save" style="background:red;">
                                                        Törlés
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            @endif

        </div>
    </div>
@endsection