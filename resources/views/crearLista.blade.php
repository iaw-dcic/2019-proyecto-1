@extends('layouts.app')


@section('content')
    <h1> Crea una nueva lista aquí! </h1>

    <form method="POST" action="/profile">
        
    {{ csrf_field() }}
    <div class="input-group">
        <div>
        <span class="input-group-addon" id="basic-addon1">Name</span>
        <input type="text" class="form-control" placeholder="Nombre Lista" aria-describedby="basic-addon1">
        </div>

        <div>
            <span class="input-group-addon" id="basic-addon2">Name</span>
            <input type="text" class="form-control" placeholder="Descripción Lista" aria-describedby="basic-addon2">
        </div>
        <div class="row">
        <div class="col-lg-6">
            <div class="input-group">
            <span class="input-group-addon">
                <input type="checkbox" aria-label="...">
            <span class="input-group-addon" id="basic-addon3">Lista Publica?</span>
        </div><!-- /.col-lg-6 -->
        <div>
            {{Auth::user()->id}}
        </div>
        <div>
            <button type="submit" >Crear Lista </button>
        </div>
    </div>
    </form>
@endsection