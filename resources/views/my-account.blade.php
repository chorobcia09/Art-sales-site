@extends('layouts.app')

@section('title', 'Moje konto')

@section('content')
    <div class="container mt-4">
        <h1>Informacje o moim koncie</h1>
        @auth
            <p>Witaj, {{ auth()->user()->name }}!</p>
            <p>Oto szczegóły Twojego konta:</p>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nazwa użytkownika:</strong> {{ auth()->user()->name }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ auth()->user()->email }}</li>
                <li class="list-group-item"><strong>Rola:</strong> {{ auth()->user()->role }}</li>
            </ul>
        @else
            <p>Nie jesteś zalogowany. <a href="{{ route('login') }}">Zaloguj się</a>, aby zobaczyć informacje o swoim koncie.</p>
        @endauth
    </div>
@endsection
