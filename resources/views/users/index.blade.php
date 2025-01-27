@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <h1 class="my-4">Użytkownicy</h1>
    @if (Auth::user() && Auth::user()->role == 'admin')
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Dodaj nowego użytkownika</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Email</th>
                <th>Rola</th>
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <th>Akcje</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    @if (Auth::user() && Auth::user()->role == 'admin')
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
