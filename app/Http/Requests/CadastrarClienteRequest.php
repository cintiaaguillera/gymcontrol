<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PlanoValido;

class CadastrarClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO: checar quem tem persmissão para executar este controlador
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'cpf' => 'required|min:14',
            'rg' => 'required|min:12',
            'matricula' => 'required',
            'endereco' => 'required',
            'plano' => ['required', new PlanoValido],
            'vencimento' => 'required',
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'Nome obrigatório',
            'cpf.required' => 'CPF obrigatório',
            'cpf.min' => 'Quantidade de caracteres inválido',
            'rg.required' => 'RG obrigatório',
            'rg.min' => 'Quantidade de caracteres invalido',
            'matricula.required' => 'Matrícula obrigatório',
            'endereco.required' => 'endereco obrigatório',
            'plano.required' => 'Selecione um plano',
            'vencimento.required' => 'Você deve preencher a data de vencimento do plano',
        ];
    }
}
