@extends('layouts.layout') 
@section('content')
<h3>Novo cliente</h3>
<form method="post" action="{{route('clients.store')}}">
    {{csrf_field()}}
    <div class="form-group">

        <label for="name">Nome</label>

        <input class="form-control" id="name" name="name">

    </div>



    <div class="form-group">

        <label for="document_number">Documento</label>

        <input class="form-control" id="document_number" name="document_number">

    </div>



    <div class="form-group">

        <label for="email">E-mail</label>

        <input class="form-control" id="email" name="email" type="email">

    </div>



    <div class="form-group">

        <label for="phone">Telefone</label>

        <input class="form-control" id="phone" name="phone">

    </div>



    <div class="form-group">

        <label for="marital_status">Estado Civil</label>

        <select class="form-control" name="marital_status" id="marital_status">

            <option value="">Selecione o estado civil</option>

            <option value="1" >Solteiro</option>

            <option value="2" >Casado</option>

            <option value="3">Divorciado</option>

            </option>

        </select>

    </div>

    <div class="form-group">

        <label for="date_birth">Data Nasc.</label>

        <input class="form-control" id="date_birth" name="date_birth" type="date">

    </div>



    <div class="radio">

        <label>

            <input type="radio" name="sex" value="m"> Masculino

        </label>

    </div>



    <div class="radio">

        <label>

            <input type="radio" name="sex" value="f"> Feminino

        </label>

    </div>



    <div class="form-group">

        <label for="physical_disability">Deficiência Física</label>

        <input class="form-control" id="physical_disability" name="physical_disability">

    </div>


    <div class="checkbox">

        <label>

            <input id="defaulter" name="defaulter" type="checkbox"> Inadimplente?

        </label>

    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
</form>
@endsection