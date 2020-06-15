@extends('templates.layout')
@section('titulo', 'cadastro de instrutor')
@section('conteudo')
    <cadastro-instrutor
        titulo="Cadastro de Instrutor"
        idformcadastro="form-cadastro-instrutor"
        token="{{csrf_token()}}"
        :aulas="{{$aulas}}">
    </cadastro-instrutor>
@endsection