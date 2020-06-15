<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoFuncionario extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_tipo_funcionario';

    protected $fillable = [
        'descricao',
    ];

    //um para muitos
    public function functionarios(){
        return $this->hasMany('App\Models\Funcionario', 'id_funcionario');
    }
}
