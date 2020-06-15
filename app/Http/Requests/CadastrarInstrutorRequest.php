<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TipoAulaValido;

class CadastrarInstrutorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO: checar quem ter permissão para executar essa função
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
            'tipoaula' => ['required', new TipoAulaValido],
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'Nome obrigatório',
            'cpf.required' => 'CPF obrigatório',
            'cpf.min' => 'Quantidade inválida de caracteres',
            'rg.required' => 'RG obrigatório',
            'rg.min' => 'Quantidade inválida de caracteres',
            'tipoaula.required' => 'Escolha um tipo de aula para o instrutor',
        ];
    }
}
