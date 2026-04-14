@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/logreg.css')}}">
@endpush

@push('scripts')
    <script src="{{ asset('js/loginform.js') }}"></script>
@endpush

@section('content')
    <div class="auth-page">
        <div class="log-container">

            <div id="loginbox" class="reg-log-box">
                <h2>Bejelentkezés</h2>

                @if ($errors->has('login'))
                    <div class="error-box">
                        ❌ {{ $errors->first('login') }}
                    </div>
                @endif

                <form id="loginForm" class="log-form" action="{{ url('/login') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
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
        </div>
    </div>
@endsection