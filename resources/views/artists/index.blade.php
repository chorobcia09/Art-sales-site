@extends('layouts.app')

@section('title', 'Lista Artystów')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach($artists as $artist)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset($artist->artist_img) }}" class="card-img-top" alt="{{ $artist->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $artist->name }}</h5>
                            <p class="card-text">Data urodzenia: {{ $artist->date_of_birth }}</p>
                            <p class="card-text">Opis: {{ \Illuminate\Support\Str::limit($artist->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                @auth
                                    <div class="btn-group">
                                        @can('update', $artist)
                                            <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-sm btn-outline-secondary">Edytuj</a>
                                        @endcan
                                        @can('delete', $artist)
                                            <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Czy na pewno chcesz usunąć tego artystę?')">Usuń</button>
                                            </form>
                                        @endcan
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            @auth
                @can('create', App\Models\Artist::class)
                    <a href="{{ route('artists.create') }}" class="btn btn-primary">Dodaj nowego artystę</a>
                @endcan
            @endauth
        </div>
    </div>
@endsection
