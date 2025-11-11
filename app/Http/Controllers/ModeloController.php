<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Modelo;
use App\Models\Marca;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        $modelos = Modelo::with('marca')->get();
        
            return view('modelo.index', compact('modelos'), [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all(); // busca todas as marcas do banco
    return view('modelo.cadastrar', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function cadastrarNovoModelo(Request $request)
    {
        // Validação
        $request->validate([
            'nome' => 'required|string|max:255',
            'marca_id' => 'required|exists:marcas,id',
        ], [
            'nome.required' => 'O nome do modelo é obrigatório.',
            'marca_id.required' => 'Selecione uma marca.',
            'marca_id.exists' => 'A marca selecionada é inválida.',
        ]);

        // Cria o modelo
        Modelo::create([
            'nome' => $request->nome,
            'marca_id' => $request->marca_id,
        ]);

        // Redireciona com mensagem
        return redirect()->route('modelo.cadastro')
                         ->with('success', 'Modelo cadastrado com sucesso!');
    }

        public function buscarModelo($id) 
    {
        $modelo = Modelo::find($id);

        $marcas = Marca::all();

        return view('modelo.edit', compact('modelo', 'marcas'));

    }

        public function ataualizarModelo(Request $request) 
    {
        $modelo = Modelo::find($request->input('id'));
        $modelo->update($request->all());
        return redirect()->route('index.modelo');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}