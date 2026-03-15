@extends('layouts.app')

@section('content')
<div class="auth-page">
    <div class="log-container">

        <div id="loginbox" class="reg-log-box">
            <h2>Bejelentkezés</h2>

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>❌ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="loginForm" class="log-form" action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                    <label for="email">E-mail cím</label>
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Jelszó</label>
                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="forgot-container">
                    <button type="button" id="forgotBtn" class="forgot-password">Elfelejtett jelszó?</button>
                </div>

                <button type="submit" class="loginbutton">Bejelentkezés</button>
            </form>

            <div class="register-option">
                <p>Még nincs fiókod? <a href="{{ route('registershow') }}" id="showRegister">Regisztráció</a></p>
            </div>
        </div>
    </div>
</div>
@endsection