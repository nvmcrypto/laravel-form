@extends('layouts.layout') 
@section('content')
<h3>Novo cliente</h3>
@include('form._form_errors')
<form method="post" action="{{route('clients.store')}}">
    @include('admin.clients._form')
    <button type="submit" class="btn btn-default">Criar</button>
    <a class="btn btn-default" href="{{route('clients.index')}}">Voltar</a> <!--inclui o botão voltar--> 
</form>
@endsection