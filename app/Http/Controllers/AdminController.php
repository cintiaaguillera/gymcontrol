<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;
use App\Models\Aula;
use App\Models\Cliente;
use App\Models\Funcionario;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dash(){
        return view('admin');
    }

    public function cadastrarCliente(){
        $planos = Plano::all();
        return view('admin-cadastrar-cliente', compact('planos'));
    }

    public function cadastrarInstrutor(){
        $aulas = Aula::all();
        return view('admin-cadastrar-instrutor', compact('aulas'));
    }

    public function registrarPagamento(){
        return view('admin-registrar-pagamento');
    }

    public function gerenciarClientes(){
        $clientes = Cliente::all();
        return view('admin-gerenciar-clientes', compact('clientes'));
    }

    public function gerenciarInstrutores(){
        $instrutores = Funcionario::all();
        return view('admin-gerenciar-instrutores', compact('instrutores'));
    }
}
