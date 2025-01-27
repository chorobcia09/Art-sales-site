@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <h1>Edycja użytkownika</h1>
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nazwa</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Hasło</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Powtórz hasło</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <div class="mb-3">
                <label for="user_img" class="form-label">Zdjęcie</label>
                <input type="text" name="user_img" id="user_img" class="form-control" value="{{ $user->user_img }}">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rola</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ $user->role }}">
            </div>
            <button type="submit" class="btn btn-success">Dalej</button>
        </form>
    </div>
@endsection
