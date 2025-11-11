<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cor;

class CorController extends Controller
{
    public function index(Request $request)
    {
        $cores = Cor::all();
        
            return view('cor.index', compact('cores'), [
            'user' => $request->user(),
        ]);
    }

    public function cadastrarNovaCor(Request $request)
    {
        
        $request->validate([
        'nome' => 'required|string|max:255|unique:cores,nome',
    ], [
        'nome.required' => 'O nome da marca é obrigatório.',
        'nome.unique' => 'Esta cor já está cadastrada.',
    ]);

        $cor = new Cor();
        $cor->nome = $request->input('nome');      
        
        $cor->save();

        return redirect()->route('cor.cadastro')->with('success', 'Cor cadastrada com sucesso!');
    }

     public function buscarCor($id) 
    {
        $cor = Cor::find($id);

        return view('cor.edit', compact('cor'));

    }

        public function ataualizarCor(Request $request) 
    {
        $cor = Cor::find($request->input('id'));
        $cor->update($request->all());
        return redirect()->route('index.cor');

    }

        public function excluirCor(string $id)
    {
            
         $cor = Cor::find($id);

        if (!$cor)
            echo "Cor não encontrada!";

        $cor->delete();

        return redirect()->route('index.cor');


    }


}
