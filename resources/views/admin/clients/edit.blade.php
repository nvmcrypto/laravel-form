@extends('layouts.layout') 
@section('content')
<h3>Novo cliente</h3>
@if($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form method="post" action="{{route('clients.update',['client'=>$client->id])}}">
    {{csrf_field()}}
    <!--<input type="hidden" name="_method" value="PUT"> OU USAR O METHOD_FIELD ABAIXO, esse PUT E NECESSARIO PARA EDIÇÃO-->
    {{method_field('PUT')}}
    <div class="form-group">

        <label for="name">Nome</label>

        <input class="form-control" id="name" name="name" value="{{$client->name}}"><!-- Posso colocar tb o required -->

    </div>



    <div class="form-group">

        <label for="document_number">Documento</label>

        <input class="form-control" id="document_number" name="document_number" value="{{$client->document_number}}">

    </div>



    <div class="form-group">

        <label for="email">E-mail</label>

        <input class="form-control" id="email" name="email" type="email" value="{{$client->email}}">

    </div>



    <div class="form-group">

        <label for="phone">Telefone</label>

        <input class="form-control" id="phone" name="phone" value="{{$client->phone}}">

    </div>



    <div class="form-group">

        <label for="marital_status">Estado Civil</label>

        <select class="form-control" name="marital_status" id="marital_status" value="{{$client->marital_status}}">

            <option value="">Selecione o estado civil</option>

            <option value="1" {{$client->marital_status == 1?'selected="selected"':''}}>Solteiro</option>

            <option value="2" {{$client->marital_status == 2?'selected="selected"':''}}>Casado</option>

            <option value="3" {{$client->marital_status == 3?'selected="selected"':''}}>Divorciado</option>

            </option>

        </select>

    </div>

    <div class="form-group">

        <label for="date_birth">Data Nasc.</label>

        <input class="form-control" id="date_birth" name="date_birth" type="date" value="{{$client->date_birth}}">

    </div>



    <div class="radio">

        <label>

            <input type="radio" name="sex" value="m" {{$client->sex == 'm'?'checked="checked"':''}}> Masculino

        </label>

    </div>



    <div class="radio">

        <label>

            <input type="radio" name="sex" value="f" {{$client->sex == 'f'?'checked="checked"':''}}> Feminino

        </label>

    </div>



    <div class="form-group">

        <label for="physical_disability">Deficiência Física</label>

        <input class="form-control" id="physical_disability" name="physical_disability" value="{{$client->physical_disability}}">

    </div>


    <div class="checkbox">

        <label>

            <input id="defaulter" name="defaulter" type="checkbox" {{$client->defaulter?'checked="checked"':''}}> Inadimplente?

        </label>

    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
    <a class="btn btn-default" href="{{route('clients.index')}}">Voltar</a> <!--inclui o botão voltar--> 
</form>
@endsection