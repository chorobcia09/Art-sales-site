<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ArtworkController,
    ArtistController,
    TransactionController,
    UserController,
    HomeController,
    RegisterController,
    Auth\LoginController,
};

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create')->middleware('auth');
Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store')->middleware('auth');
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show')->middleware('auth');
Route::get('/artists/{artist}/edit', [ArtistController::class, 'edit'])->name('artists.edit')->middleware('auth');
Route::put('/artists/{artist}', [ArtistController::class, 'update'])->name('artists.update')->middleware('auth');
Route::delete('/artists/{artist}', [ArtistController::class, 'destroy'])->name('artists.destroy')->middleware('auth');


Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks.index');
Route::get('/artworks/create', [ArtworkController::class, 'create'])->name('artworks.create')->middleware('auth');
Route::get('/artworks/{artwork}/edit', [ArtworkController::class, 'edit'])->name('artworks.edit')->middleware('auth');
Route::put('/artworks/{artwork}', [ArtworkController::class, 'update'])->name('artworks.update')->middleware('auth');
Route::post('/artworks', [ArtworkController::class, 'store'])->name('artworks.store')->middleware('auth');
Route::get('/buy/{artwork}', [ArtworkController::class, 'buy'])->name('buy')->middleware('auth');
Route::delete('/artworks/{artwork}', [ArtworkController::class, 'destroy'])->name('artworks.destroy')->middleware('auth');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index')->middleware('auth');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store')->middleware('auth');


Route::get('/moje-konto', function () {return view('my-account'); })->name('my-account')->middleware('auth');

