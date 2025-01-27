@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edytuj dzieło sztuki</h2>
        <form method="POST" action="{{ route('artworks.update', $artwork->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tytuł</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $artwork->title }}">
            </div>
            <div class="form-group">
                <label for="description">Opis</label>
                <textarea class="form-control" id="description" name="description">{{ $artwork->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Cena</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $artwork->price }}">
            </div>
            <div class="form-group">
                <label for="image">Obraz</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="{{ asset($artwork->artwork_img) }}" alt="Obraz dzieła sztuki" style="max-width: 200px;">
            </div>
            <div class="form-group">
                <label for="artist_id">Artysta</label>
                <select class="form-control" id="artist_id" name="artist_id">
                    @foreach($artists as $artist)
                        <option value="{{ $artist->id }}" {{ $artwork->artist_id == $artist->id ? 'selected' : '' }}>{{ $artist->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
    </div>
@endsection
