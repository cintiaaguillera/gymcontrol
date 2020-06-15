@extends('templates.layout')
@section('titulo', 'cadastro de cliente')
@section('conteudo')

    <cadastro-cliente
        titulo="Cadastro de Cliente"
        idformcadastro="form-cadastro-cliente"
        token="{{ csrf_token() }}"
        :planos="{{$planos}}"
        >   
       
    </cadastro-cliente>
   {{--  @foreach ($planos as $plano)
        <h1>{{$plano->nome}}</h1>
    @endforeach --}}
@endsection




