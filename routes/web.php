<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\CarroController;
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


        Route::get('/index', function () {
        return view('index');
    });

    Route::get('/marca', [MarcaController::class, 'index'])
        ->name('index.marca');

        Route::get('/cadastrar-marca', function () {
        return view('marca.cadastrar');
    }) -> name('marca.cadastro');

    Route::post('/marca', [MarcaController::class, 'cadastrarNovaMarca'])
    ->name('cadastrar.marca');

        Route::get('/modelo', [ModeloController::class, 'index'])
    ->name('index.modelo');

        Route::get('/cadastrar-modelo', [ModeloController::class, 'create'])
    -> name('modelo.cadastro');

    Route::post('/cadastrar-modelo', [ModeloController::class, 'cadastrarNovoModelo'])
    ->name('cadastrar.modelo');


    Route::get('/cor', [CorController::class, 'index'])
        ->name('index.cor');

    Route::get('/cadastrar-cor', function () {
        return view('cor.cadastrar');
    }) -> name('cor.cadastro');

    Route::post('/cadastrar-cor', [CorController::class, 'cadastrarNovaCor'])
    ->name('cadastrar.cor');
    

    Route::get('/veiculo', [CarroController::class, 'index'])
        ->name('index.veiculo');

    Route::get('/cadastrar-veiculo', function () {      
        return view('carro.cadastrar');
    }) -> name('veiculo.cadastro');

    Route::post('/cadastrar-veiculo', [CarroController::class, 'cadastrarNovoVeiculo'])
    ->name('cadastrar.veiculo');

    Route::get('/perfil', [ProfileController::class, 'edit'])->name('perfil.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('perfil.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('perfil.destroy');
    Route::get('/deletar-senha', [ProfileController::class, 'passdelete'])->name('delete.password');


});

// 🔹 Rotas de autenticação (login, registro, etc.)
require __DIR__.'/auth.php';