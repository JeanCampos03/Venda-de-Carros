<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{    

    protected $table = 'cores';
    protected $fillable = ['nome'];    

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = ucwords(strtolower($value));
    }

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }

    
}

