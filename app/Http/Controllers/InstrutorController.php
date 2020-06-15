<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CadastrarInstrutorRequest;

use App\Models\Funcionario;
use App\Models\TipoFuncionario;
use App\Models\Aula;
use Exception;

class InstrutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function cadastrar(CadastrarInstrutorRequest $request){

        try{
            $instrutor  = new Funcionario();
            $tipoFuncionario  = new TipoFuncionario();
            $aula = new Aula();

            $instrutor->nome = $request->nome;
            $instrutor->cpf = $request->cpf;
            $instrutor->rg = $request->rg;

            //se nulo, dispara uma exceção personalizada
            $aula = $aula::find($request->tipoaula);

            //se nulo, dispara uma exceção personalizada
            $tipoFuncionario  = $tipoFuncionario::find(1);
            
            if($aula==null){
                throw new Exception('Erro ao incluir a aula selecionada.');
            }

            if($tipoFuncionario==null){
                throw new Exception('Erro ao cadastrar o Instrutor');
            }
            
            $instrutor->tipoFuncionario()->associate($tipoFuncionario);

            $instrutor->save();

            $instrutor = $instrutor::find($instrutor->id_funcionario);

            $aula->funcionario()->associate($instrutor);

            $aula->update([
                "id_funcionario" => $instrutor->id_funcionario,
            ]);

            $aula->save();

            return response()->json(["message" => "Instrutor cadastrado com sucesso! "], 200);
        }
        catch(Exception $e){
            return response()->json(["errormessage" => $e->getMessage()], 500);
            //return response()->json(["errormessage" => "Erro ao efetutar o cadastro"], 500);
        }
    }
}
