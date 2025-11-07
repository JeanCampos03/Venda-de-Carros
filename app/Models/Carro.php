<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carros extends Model
{
    protected $table = 'carros';
    protected $fillable = [
        'url_foto',
        'marca',
        'modelo', 
        'cor',
        'ano_fabricacao',
        'quilometragem',
        'valor_total',
        'detalhes'
        ];
}