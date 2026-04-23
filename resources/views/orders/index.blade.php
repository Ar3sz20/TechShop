@extends('layouts.app')

@push('styles')
<style>
    .success-page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70vh;
        flex-direction: column;
        text-align: center;
        font-family: Arial, sans-serif;
        animation: fadeIn 0.5s ease;
    }

    .success-icon {
        font-size: 4rem;
        color: #28a745;
        margin-bottom: 20px;
        animation: pop 0.6s ease;
    }

    .success-icon .material-icons {
        font-size: inherit;
    }

    .success-message {
        font-size: 1.5rem;
        color: #155724;
    }

    @keyframes pop {
        0% { transform: scale(0); }
        60% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
@endpush

@section('content')
<div class="success-page">
    <div class="success-icon"><span class="material-icons">check_circle</span></div>
    <div class="success-message">
        Sikeres rendelés!<br>
        5 másodperc múlva visszairányítunk a főoldalra...
    </div>
</div>

<script>
    setTimeout(() => {
        window.location.href = "{{ route('home') }}";
    }, 5000);
</script>
@endsection