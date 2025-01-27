@extends('layouts.app')

@section('title', 'Dostępne dzieła sztuki')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach($artworks as $artwork)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset($artwork->artwork_img) }}" class="card-img-top" alt="Artwork Image">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $artwork->title }}</h5>
                            <p class="card-text">Autor: {{ $artwork->artist ? $artwork->artist->name : 'Nieznany' }}</p>
                            <p class="card-text">Opis: {{ \Illuminate\Support\Str::limit($artwork->description, 100) }}</p>
                            <p class="card-text">Data utworzenia: {{ $artwork->created_at->format('Y-m-d') }}</p>
                            <p class="card-text">Cena: {{ $artwork->price }} zł</p>
                            <a href="{{ route('transactions.index', ['artwork_id' => $artwork->id]) }}" class="btn btn-primary mt-auto">Kup Teraz</a>
                            @auth
                                @if(Auth::user()->role == 'admin')
                                    <form action="{{ route('artworks.destroy', $artwork->id) }}" method="POST" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Usuń</button>
                                    </form>
                                    <a href="{{ route('artworks.edit', $artwork->id) }}" class="btn btn-secondary mt-2">Edytuj</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @auth
        <div class="container text-center mt-4">
            <a href="{{ route('artworks.create') }}" class="btn btn-primary">Dodaj dzieło</a>
        </div>
    @endauth
@endsection
