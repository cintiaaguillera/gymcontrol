<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_aula';

    protected $fillable = [
        'id_aula',
        'nome',
        'id_funcionario',
    ];

    public function funcionario()
    {
        return $this->belongsTo('App\Models\Funcionario', 'id_funcionario', 'id_aula');
    }

}
