<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Carro;

class CarroController extends Controller
{
    public function index() 
    {
        //$carros = "SELECT * FROM carros";
        $carros = Carro::all();
        //var_dump($carros);

        //compact
        //echo "chegou no controller carros";
        return view('carros.index',
        compact('carros'));
    }


    public function cadastrarNovoCarro(Request $request)
    {
        $carro = new Carro();
        $carro->url_foto = $request->input('url_foto');
        $carro->marca = $request->input('marca');
        $carro->modelo = $request->input('modelo');
        $carro->cor = $request->input('cor');
        $carro->ano_fabricacao = $request->input('ano_fabricacao');
        $carro->quilometragem = $request->input('quilometragem');
        $carro->valor_total = $request->input('valor_total');
        $carro->detalhes = $request->input('detalhes');
                
        $carro->save();

        return redirect()->route('carro.index');
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




    