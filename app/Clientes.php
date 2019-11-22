<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone'
    ];

    public function enderecos()
    {
        return $this->hasMany(ClientesEnderecos::class);
    }
}
