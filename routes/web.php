<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 🔹 Rota pública (visível para todos)
Route::get('/', function () {
    return view('home');
})->name('home');

// 🔒 Rotas protegidas (apenas para logados)
Route::middleware('auth')->group(function () {

    Route::get('/index', function () {
        return view('index');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔹 Rotas de autenticação (login, registro, etc.)
require __DIR__.'/auth.php';
