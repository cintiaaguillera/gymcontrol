<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
    protected $primarykey = 'id_cliente';
    protected $appends = ['plano'];

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'endereco',
        'matricula',
        'id_plano',
    ];

    //muitos para um
    public function plano(){
        return $this->belongsTo('App\Models\Plano','id_plano');
    }

    //um para muitos
    public function pagamentos(){
        return $this->hasMany('App\Models\Pagamento', 'id_pagamento');
    }

    public function getPlanoAttribute()
    {
        return $this->plano()->get();
        //return $this->plano()->get()->toArray();
    }


}
