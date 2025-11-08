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

        Route::get('/carro/cadastrar', function () {
        return view('carro.index');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/perfil', [ProfileController::class, 'edit'])->name('perfil.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('perfil.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('perfil.destroy');
    Route::get('/deletar-senha', [ProfileController::class, 'passdelete'])->name('delete.password');


});

// 🔹 Rotas de autenticação (login, registro, etc.)
require __DIR__.'/auth.php';
