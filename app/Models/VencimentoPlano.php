<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VencimentoPlano extends Model
{
    public $timestamps =  false;
    protected $primarykey = 'id_vencimento';

    protected $fillable = [
        'vencimento',
        'id_plano',
        'id_cliente',
    ];

    //muitos para um
    public function cliente(){
        return $this->belongsTo('App\Models\Cliente', 'id_cliente');
    }

    //muitos para um
    public function plano(){
        return $this->belongsTo('App\Models\Plano', 'id_plano');
    }

}
