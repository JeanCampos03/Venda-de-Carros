<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Modelo;
use App\Models\Marca;

class ModeloController extends Controller
{
     public function index(Request $request)
    {
        $modelos = Modelo::with('marca')->get();
        
            return view('modelo.index', compact('modelos'), [
            'user' => $request->user(),
        ]);
    }

    public function create()
    {
        $marcas = Marca::all(); 
    return view('modelo.cadastrar', compact('marcas'));
    }

    public function cadastrarNovoModelo(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'marca_id' => 'required|exists:marcas,id',
        ], [
            'nome.required' => 'O nome do modelo é obrigatório.',
            'marca_id.required' => 'Selecione uma marca.',
            'marca_id.exists' => 'A marca selecionada é inválida.',
        ]);

        Modelo::create([
            'nome' => $request->nome,
            'marca_id' => $request->marca_id,
        ]);

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

    public function excluirModelo(string $id)
    {
            
         $modelo = Modelo::find($id);

        if (!$modelo)
            echo "Modelo não encontrado!";

        $modelo->delete();

        return redirect()->route('index.modelo');


    }
}