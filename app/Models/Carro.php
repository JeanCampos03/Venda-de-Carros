<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $table = 'carros';
    protected $fillable = [
        'marca_id', 
        'modelo_id', 
        'cor_id',
        'ano_fabricacao', 
        'quilometragem', 
        'valor_total',
        'detalhes', 
        'url_foto1',
        'url_foto2',
        'url_foto3'
    ];

    public function marca() { return $this->belongsTo(Marca::class); }
    public function modelo() { return $this->belongsTo(Modelo::class); }
    public function cor() { return $this->belongsTo(Cor::class); }
}