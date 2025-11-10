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

        public function create(Request $request)
    {

            // 1. Busca todas as marcas (cada uma com seus modelos)
        $marcas = Marca::with('modelos')->get();

        // 2. Busca todas as cores
        $cores = Cor::all();

        // 3. Verifica se o usuário selecionou uma marca
        $modelos = collect(); // começa vazio

        if ($request->filled('marca_id')) {
            // Busca os modelos dessa marca
            $modelos = Modelo::where('marca_id', $request->marca_id)->get();
        }

        return view('carro.cadastrar', compact('marcas', 'modelos', 'cores'));

    }

            public function update(Request $request)
    {

            // 1. Busca todas as marcas (cada uma com seus modelos)
        $marcas = Marca::with('modelos')->get();

        // 2. Busca todas as cores
        $cores = Cor::all();

        // 3. Verifica se o usuário selecionou uma marca
        $modelos = collect(); // começa vazio

        if ($request->filled('marca_id')) {
            // Busca os modelos dessa marca
            $modelos = Modelo::where('marca_id', $request->marca_id)->get();
        }

        return view('carro.edit', compact('marcas', 'modelos', 'cores'));

    }


    public function cadastrarNovoVeiculo(Request $request)
    {

        $request->validate([
        'ano_fabricacao' => 'required',
        'quilometragem' => 'required',
        'valor_total' => 'required',
        'url_foto1' => 'required|url|max:255',
        'url_foto2' => 'required|url|max:255',
        'url_foto3' => 'required|url|max:255'
    ], [
        'ano_fabricacao.required' => 'O ano de fabricação é obrigatório.',
        'quilometragem.required' => 'A quilometragem atual é obrigatória.',
        'valor_total.required' => 'O valor do veículo é obrigatório.',
        'url_foto1.required' => 'É obrigatório inserir a imagem 1.',
        'url_foto2.required' => 'É obrigatório inserir a imagem 2.',
        'url_foto3.required' => 'É obrigatório inserir a imagem 3.',
        'url_foto1.url' => 'A imagem 1 deve ser um link válido.',
        'url_foto2.url' => 'A imagem 2 deve ser um link válido.',
        'url_foto3.url' => 'A imagem 3 deve ser um link válido.',
        'url_foto1.max' => 'O link da imagem 1 é muito longo (máx. 255 caracteres).',
        'url_foto2.max' => 'O link da imagem 2 é muito longo (máx. 255 caracteres).',
        'url_foto3.max' => 'O link da imagem 3 é muito longo (máx. 255 caracteres).',
    ]);

        $carro = new Carro();
        $carro->url_foto1 = $request->input('url_foto1');
        $carro->url_foto2 = $request->input('url_foto2');
        $carro->url_foto3 = $request->input('url_foto3');
        $carro->marca_id = $request->input('marca_id');
        $carro->modelo_id = $request->input('modelo_id');
        $carro->cor_id = $request->input('cor_id');
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


    $marcas = Marca::all();
    $modelos = Modelo::where('marca_id', $carro->marca_id)->get();
    $cores = Cor::all();
        return view('carro.edit', compact('carro', 'marcas', 'modelos', 'cores'));

    }

        public function ataualizarCarro(Request $request) 
    {
        $carro = Carro::find($request->input('id'));
        $carro->update($request->all());
        return redirect()->route('carros.index');

    }

    public function detalhes($id)
    {
        $carros = Carro::find($id);

        return view('detalhes', compact('carros'));
    }


}




    