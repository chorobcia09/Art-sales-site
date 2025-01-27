@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <div class="container">
        <h1>User Details</h1>
        <ul>
            <li>ID: {{ $user->id }}</li>
            <li>Name: {{ $user->name }}</li>
            <li>Email: {{ $user->email }}</li>
            <li>Role: {{ $user->role }}</li>
        </ul>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back to Users</a>
    </div>
@endsection
