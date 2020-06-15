@extends('templates.layout')
@section('titulo', 'gerenciar instrutores')
@section('conteudo')
<table-manage-instrutores
        titulo="Gerenciamento de instrutores"
        :instrutores="{{$instrutores}}"
        :titulos="['#','NOME','CPF','RG', 'TIPO DE AULA']">
</table-manage-instrutores>
@endsection