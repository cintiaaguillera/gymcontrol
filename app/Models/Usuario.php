<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;
    
    public $timestamps = false;
    protected $primaryKey = 'id_usuario';
    //protected $password = 'senha';
    
    //personalizar a guarda
    //protected $guard = 'admin';

    protected $fillable = [
        'nome', 
        'email',
        'senha',
    ];

    protected $hidden = [
        'senha', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function username()
    {
        return $this->nome;
    }

}
