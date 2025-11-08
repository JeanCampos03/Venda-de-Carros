<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
        protected $table = 'marcas';
    protected $fillable = [
        'nome'
        ];

        public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}
