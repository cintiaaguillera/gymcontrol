<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_plano';

    protected $fillable = [
        'nome',
        'descricao',
        'valor',
    ];
    

    public function pagamentos(){
        return $this->hasMany('App\Models\Pagamento', 'id_pagamento', 'id_plano');
    }

    public function clientes(){
        return $this->hasMany('App\Models\Cliente', 'id_cliente', 'id_plano');
    }
    
    public function vencimentos(){
        return $this->hasMany('App\Models\VencimentoPlano', 'id_vencimento', 'id_plano');
    }
}
