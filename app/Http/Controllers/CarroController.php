<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carro;
use App\Models\Modelo;
use App\Models\Cor;
use App\Models\Marca;

class CarroController extends Controller
{
    public function index() 
    {
        //$carros = "SELECT * FROM carros";
        $carros = Carro::all();
        //var_dump($carros);

        //compact
        //echo "chegou no controller carros";
        return view('carro.index',
        compact('carros'));
    }

        public function create()
    {
        $modelos = Modelo::all(); // busca todas as marcas do banco
        $marcas = Marca::all(); // busca todas as marcas do banco
        $cores = Cor::all(); // busca todas as marcas do banco

    return view('veiculo.cadastrar', compact('modelos','marcas', 'cores'));
    }


    public function cadastrarNovoVeiculo(Request $request): RedirectResponse
    {

         $request->validate([
        'ano' => 'required',
        'quilometragem' => 'required',
        'valor' => 'required'
    ], [
        'ano.required' => 'O ano de fabricação é obrigatório.',
        'quilometragem.required' => 'O ano de fabricação é obrigatório.',
        'valor.required' => 'O ano de fabricação é obrigatório.',
    ]);

        $carro = new Carro();
        $carro->url_foto1 = $request->input('url_foto1');
        $carro->url_foto2 = $request->input('url_foto2');
        $carro->url_foto3 = $request->input('url_foto3');
        $carro->marca = $request->input('marca');
        $carro->modelo = $request->input('modelo');
        $carro->cor = $request->input('cor');
        $carro->ano_fabricacao = $request->input('ano_fabricacao');
        $carro->quilometragem = $request->input('quilometragem');
        $carro->valor_total = $request->input('valor_total');
        $carro->detalhes = $request->input('detalhes');
                
        $carro->save();

        return redirect()->route('veiculo.cadastro')->with('success', 'Veículo cadastrada com sucesso!');
    }


    public function buscarCarro($id) 
    {
        $carro = Carro::find($id);

        if (!$carro)
            echo "Carro não encontrado";

        return view('carro.alterar', compact('carro'));

    }

    public function ataualizarCarro(Request $request) 
    {
        $carro = Carro::find($request->input('id'));
        $carro->update($request->all());
        return redirect()->route('carros.index');

    }
}




    