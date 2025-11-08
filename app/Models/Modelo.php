<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Modelo extends Model
{
    protected $fillable = ['nome', 'marca_id'];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}


