@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Nazwa dzieła: {{ $artwork->title }}</h2>
        <p>Cena: {{ $artwork->price }} zł</p>

        <form action="{{ route('transactions.store') }}" method="post">
            @csrf
            <label for="transaction_type">Wybierz typ transakcji:</label>
            <select name="transaction_type" id="transaction_type">
                <option value="kartka">Płatność kartą</option>
                <option value="gotówka">Płatność gotówką</option>
            </select>
            <button type="submit" class="btn btn-primary mt-3">Złóż zamówienie</button>
        </form>
    </div>
@endsection
