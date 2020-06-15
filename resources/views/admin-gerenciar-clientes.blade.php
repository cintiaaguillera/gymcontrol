@extends('templates.layout')
@section('titulo', 'gerenciar clientes')
@section('conteudo')
    <table-manage-clientes
        titulo="Gerenciamento de clientes"
        :clientes="{{$clientes}}"
        :titulos="['#','NOME','CPF','RG', 'ENDEREÇO', 'MATRÍCULA','PLANO']"
        >
    </table-manage-clientes>
@endsection