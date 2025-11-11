<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// 🔹 Rota pública (visível para todos)
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/detalhes/{id}', [CarroController::class, 'detalhes'])->name('veiculo.detalhes');


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

    Route::get('/cadastrar-veiculo',  [CarroController::class, 'create'])
    -> name('veiculo.cadastro');

    Route::get('/editar-veiculo',  [CarroController::class, 'update'])
    -> name('veiculo.edita');

    Route::post('/cadastrar-veiculo', [CarroController::class, 'cadastrarNovoVeiculo'])
    ->name('cadastrar.veiculo');

    Route::get('/editar-veiculo/{id}',[CarroController::class, 'buscarCarro'])->name('veiculo.buscar');

    Route::post('/atualizar-veiculo/{id}', [CarroController::class, 'ataualizarCarro'])->name('veiculo.atualizar');

    Route::get('/editar-modelo/{id}',[ModeloController::class, 'buscarModelo'])->name('modelo.buscar'); 

    Route::post('/atualizar-modelo/{id}', [ModeloController::class, 'ataualizarModelo'])->name('modelo.atualizar');

    Route::get('/editar-cor/{id}',[CorController::class, 'buscarCor'])->name('cor.buscar'); 

    Route::post('/atualizar-cor/{id}', [CorController::class, 'ataualizarCor'])->name('cor.atualizar');

    Route::get('/editar-marca/{id}',[MarcaController::class, 'buscarMarca'])->name('marca.buscar'); 

    Route::post('/atualizar-marca/{id}', [MarcaController::class, 'ataualizarMarca'])->name('marca.atualizar');


    Route::get('/excluir-marca/{id}',[MarcaController::class, 'excluirMarca'])->name('marca.excluir');
    Route::get('/excluir-modelo/{id}',[ModeloController::class, 'excluirModelo'])->name('modelo.excluir');
    Route::get('/excluir-cor/{id}',[CorController::class, 'excluirCor'])->name('cor.excluir');
    Route::get('/excluir-veiculo/{id}',[CarroController::class, 'excluirVeiculo'])->name('veiculo.excluir');

    

    Route::get('/perfil', [ProfileController::class, 'edit'])->name('perfil.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('perfil.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('perfil.destroy');
    Route::get('/deletar-senha', [ProfileController::class, 'passdelete'])->name('delete.password');


});

// 🔹 Rotas de autenticação (login, registro, etc.)
require __DIR__.'/auth.php';