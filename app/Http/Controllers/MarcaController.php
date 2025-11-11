<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index(Request $request)
    {
        $marcas = Marca::all();
        
            return view('marca.index', compact('marcas'), [
            'user' => $request->user(),
        ]);
    }

    public function cadastrarNovaMarca(Request $request)
    {

        $request->validate([
        'nome' => 'required|string|max:255|unique:marcas,nome',
    ], [
        'nome.required' => 'O nome da marca é obrigatório.',
        'nome.unique' => 'Esta marca já está cadastrada.',
    ]);

        $marca = new Marca();
        $marca->nome = $request->input('nome');      
        
        $marca->save();

        return redirect()->route('marca.cadastro')->with('success', 'Marca cadastrada com sucesso!');
    }

    public function buscarMarca($id) 
    {
        $marca = Marca::find($id);

        return view('marca.edit', compact('marca'));

    }

        public function ataualizarMarca(Request $request) 
    {
        $marca = Marca::find($request->input('id'));
        $marca->update($request->all());
        return redirect()->route('index.marca');

    }             

    public function excluirMarca(string $id)
    {
            
         $marca = Marca::find($id);

        if (!$marca)
            echo "Marca não encontrada!";

        $marca->delete();

        return redirect()->route('index.marca');


    }
}