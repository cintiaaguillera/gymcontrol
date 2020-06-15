<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
   public $timestamps = false;
   protected $primaryKey = 'id_funcionario';
   protected $appends = ['tipoAula'];

   protected $fillable = [
      'id_funcionario',
      'nome',
      'cpf',
      'rg',
      'id_tipo_funcionario',
   ];
    
    //muitos para um
    public function tipoFuncionario(){
       return $this->belongsTo('App\Models\TipoFuncionario', 'id_tipo_funcionario');
    }

    //um para muitos
    public function aulas(){
       return $this->hasMany('App\Models\Aula', 'id_funcionario', 'id_funcionario');
           // ->join('funcionarios', 'aulas.id_aula','=', 'items.item_id');
    }

    public function getTipoAulaAttribute(){
       return $this->aulas()->get();
    }
}
