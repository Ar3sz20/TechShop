@extends('layouts.app')

@section('content')
<div class="cart-container">
    <h1>🛒 Kosár</h1>

    <table class="cart-table">
        <thead>
            <tr>
                <th>Termék</th>
                <th>Darab</th>
                <th>Ár</th>
                <th>Összesen</th>
                <th>Művelet</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ultra Laptop</td>
                <td>1</td>
                <td>300 000 Ft</td>
                <td>300 000 Ft</td>
                <td><button class="remove-btn">Törlés</button></td>
            </tr>
            <tr>
                <td>Okostelefon Pro</td>
                <td>2</td>
                <td>150 000 Ft</td>
                <td>300 000 Ft</td>
                <td><button class="remove-btn">Törlés</button></td>
            </tr>
        </tbody>
    </table>

    <div class="cart-summary">
        <p>Összesen: <strong>600 000 Ft</strong></p>
        <button class="checkout-btn">Megrendelés</button>
    </div>
</div>
@endsection
