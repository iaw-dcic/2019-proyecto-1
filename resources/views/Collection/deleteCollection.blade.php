@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Eliminar libro: {{$collec->title}}</h1>
        <p class="lead">IAW - 2019</p>
    </div>
</div>

<div class="container">
<form method="POST" action="/home/storeCollection/deleteCollection/{{$id}}">

    {{csrf_field()}}

    <h4>Eliminar</h4>
    <p>Desea eliminar la coleccion de libros?</p>

    <button type="submit" class="btn btn-primary">Aceptar</button>
    <a href="/home/storeCollection" class="btn btn-primary"> Cancelar</a>

</form>

</div>

@endsection