@extends('layouts.appIndex')

@section('contenido')
<h5> Resultado de la busqueda: <b>{{$perfil}}</b></h5>
<div class="card">
@foreach ($usuarios as $usuario)
    <div class="card-body">
        <a href="/profiles/{{$usuario->id}}"> {{$usuario->name}}</a>
    </div>
@endforeach
</div>
@endsection  