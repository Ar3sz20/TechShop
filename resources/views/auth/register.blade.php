@extends('layouts.app')

@section('content')
<div class="log-container">

    <div id="registerbox" class="reg-log-box" style="display:none;">
        <h2>Regisztráció</h2>
        <form id="registerForm" class="log-form" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="name" id="username" required>
                <label for="username">Felhasználónév</label>
            </div>

            <div class="input-group">
                <input type="email" name="email" id="regEmail" required>
                <label for="regEmail">E-mail cím</label>
            </div>

            <div class="input-group">
                <input type="password" name="password" id="regPassword" required>
                <label for="regPassword">Jelszó</label>
            </div>

            <div class="input-group">
                <input type="password" name="password_confirmation" id="regPasswordConfirm" required>
                <label for="regPasswordConfirm">Jelszó megerősítése</label>
            </div>

            <button type="submit" class="loginbutton">Regisztráció</button>
        </form>

        <p>Van már fiókod? <a href="{{ route('login') }}" id="showLogin">Bejelentkezés</a></p>
    </div>
</div>
@endsection
