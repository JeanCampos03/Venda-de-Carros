<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
        protected $table = 'marcas';
    protected $fillable = [
        'nome'
        ];

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = ucwords(strtolower($value));
    }

        public static function boot()
    {
        parent::boot();

        static::creating(function ($marca) {
            $existe = self::whereRaw('LOWER(nome) = ?', [strtolower($marca->nome)])->first();

            if ($existe) {
                throw new \Exception("A marca '{$marca->nome}' já existe.");
            }
        });
    }       

        public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}