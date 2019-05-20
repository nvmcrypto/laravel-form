@extends('layouts.layout') 
@section('content')
<h3>Novo cliente</h3>
@include('form._form_errors')
<form method="post" action="{{route('clients.update',['client'=>$client->id])}}">
    <!--<input type="hidden" name="_method" value="PUT"> OU USAR O METHOD_FIELD ABAIXO, esse PUT E NECESSARIO PARA EDIÇÃO-->
    {{method_field('PUT')}}
    @include('admin.clients._form')
    <button type="submit" class="btn btn-default">Salvar</button>
    <a class="btn btn-default" href="{{route('clients.index')}}">Voltar</a> <!--inclui o botão voltar--> 
</form>
@endsection