<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    public $timestamps = false;
    protected $primarykey =  'id_pagamento';

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'id_cliente');
    }

    public function plano()
    {
        return $this->belongsTo('App\Models\Plano', 'id_plano');
    }

}

