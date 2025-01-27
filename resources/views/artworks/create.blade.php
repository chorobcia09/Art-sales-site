@extends('layouts.app')

@section('title', 'Dodaj nowe dzieło sztuki')

@section('content')
    <div class="container mt-4">
        <h2>Dodaj nowe dzieło sztuki</h2>
        <form action="{{ route('artworks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Tytuł</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Opis</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Cena</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" min="0" value="{{ old('price') }}" required>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Zdjęcie</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="artist_id" class="form-label">Wybierz Artystę</label>
                <select class="form-control @error('artist_id') is-invalid @enderror" id="artist_id" name="artist_id">
                    <option value="">Wybierz artystę</option>
                    @foreach($artists as $artist)
                        <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                    @endforeach
                </select>
                @error('artist_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="artist_name" class="form-label">Lub dodaj nowego artystę</label>
                <input type="text" class="form-control @error('artist_name') is-invalid @enderror" id="artist_name" name="artist_name" value="{{ old('artist_name') }}">
                <small class="form-text text-muted">Jeśli artysta nie istnieje, zostanie utworzony nowy.</small>
                @error('artist_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var artistSelect = document.getElementById('artist_id');
            var artistNameInput = document.getElementById('artist_name');

            artistSelect.addEventListener('change', function () {
                if (this.value) {
                    artistNameInput.disabled = true;
                    artistNameInput.value = '';
                } else {
                    artistNameInput.disabled = false;
                }
            });
        });
    </script>
@endsection
