<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $marcas = Marca::all();
        
            return view('marca.index', compact('marcas'), [
            'user' => $request->user(),
        ]);
    }

    


    /**
     * Show the form for creating a new resource.
     */
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

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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