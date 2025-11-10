<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Modelo extends Model
{
    protected $fillable = ['nome', 'marca_id'];

        // Mutator: sempre salvar o nome do modelo em UPPERCASE
    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}


