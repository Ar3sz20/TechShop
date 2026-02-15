@extends('layouts.app')

@section('content')
<div class="log-container">

    <div id="loginbox" class="reg-log-box">
        <h2>Bejelentkezés</h2>
        <form id="loginForm" class="log-form" action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="email" name="email" id="email" required>
                <label for="email">E-mail cím</label>
            </div>

            <div class="input-group">
                <input type="password" name="password" id="password" required>
                <label for="password">Jelszó</label>
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

@endsection
