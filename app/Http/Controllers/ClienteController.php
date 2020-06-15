<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CadastrarClienteRequest;
use App\Models\Cliente;
use App\Models\Plano;
use App\Models\VencimentoPlano;

use App\Exceptions\PlanoNotFound;
use Exception;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function cadastrar(CadastrarClienteRequest $request){

        try{
            $cliente  = new Cliente;
            $plano  = new Plano;
            $vencimento = new VencimentoPlano;

            //dados do cliente
            $cliente->nome = $request->nome;
            $cliente->cpf = $request->cpf;
            $cliente->rg = $request->rg;
            $cliente->matricula = $request->matricula;
            $cliente->endereco = $request->endereco;

            //dados do vencimento
            $vencimento->vencimento = $request->vencimento;
            //$cliente->id_plano = $request->plano;

            //se nulo, dispara uma exceção personalizada
            $plano  = $plano::find($request->plano);
             
            if($plano==null){
                throw new PlanoNotFound('Ocorreu um erro ao incluir o plano selecionado.');
            }

            $vencimento->cliente()->associate($cliente);
            $vencimento->plano()->associate($plano);
            $cliente->plano()->associate($plano);
            
            $cliente->save();

            return response()->json(["message" => "Cliente cadastrado com sucesso! "], 200);
        }
        catch(PlanoNotFound $expPlan){
            return response()->json(["errormessage" => $expPlan->getMessage()], 500);
        }
        catch(Exception $e){
            return response()->json(["errormessage" => "Ocorreu um erro ao cadastrar o cliente! "], 500);
        }
    }
}
