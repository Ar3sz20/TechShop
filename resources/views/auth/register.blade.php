@extends('layouts.app')

@section('content')
<div class="auth-page">
    <div class="log-container">

        <div id="registerbox" class="reg-log-box">
            <h2>Regisztráció</h2>

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>❌ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="registerForm" class="log-form" action="{{ url('/register') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="name" id="username" value="{{ old('name') }}" required>
                    <label for="username">Felhasználónév</label>
                    @error('name')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="email" name="email" id="regEmail" value="{{ old('email') }}" required>
                    <label for="regEmail">E-mail cím</label>
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="password" name="password" id="regPassword" required>
                    <label for="regPassword">Jelszó</label>
                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="password" name="password_confirmation" id="regPasswordConfirm" required>
                    <label for="regPasswordConfirm">Jelszó megerősítése</label>
                </div>

                <button type="submit" class="loginbutton">Regisztráció</button>
            </form>

            <p>Van már fiókod? <a href="{{ route('loginshow') }}" id="showLogin">Bejelentkezés</a></p>
        </div>
    </div>
</div>
@endsection