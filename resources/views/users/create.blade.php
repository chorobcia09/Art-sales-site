@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="container">
        <h1>Dodaj nowego użytkownika</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nazwa</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Hasło</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Powtórz hasło</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="user_img" class="form-label">Zdjęcie</label>
                <input type="text" name="user_img" id="user_img" class="form-control">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rola</label>
                <input type="text" name="role" id="role" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
