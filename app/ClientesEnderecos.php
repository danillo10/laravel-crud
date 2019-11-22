<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientesEnderecos extends Model
{
    
    protected $fillable = [
        'clientes_id',
        'cep',
        'endereco',
        'bairro',
        'complemento',
        'numero',
        'cidade',
        'estado',
    ];

    public function clientes()
    {
        return $this->belongsTo(Clientes::class);
    }

}
