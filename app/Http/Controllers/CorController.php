<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cor;

class CorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cores = Cor::all();
        
            return view('cor.index', compact('cores'), [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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
