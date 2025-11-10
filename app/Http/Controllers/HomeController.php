<?php

namespace App\Http\Controllers;

use App\Models\Carro;

class HomeController extends Controller
{
    public function index()
    {
        // Busca todos os carros com suas relações
        $carros = Carro::with(['marca', 'modelo', 'cor'])->get();

        // Retorna para a view pública "home.blade.php"
        return view('home', compact('carros'));
    }
}
