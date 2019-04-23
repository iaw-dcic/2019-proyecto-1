@extends('layouts.app')


@section('content')
    <h1> Crea una nueva lista aquí! </h1>

    <form method="POST" action="/profile">
        
    {{ csrf_field() }}
        <div>
            <input name="titulo" placeholder="Titulo Lista">
        </div>

        <div>
            <textarea name="ListDescription" placehodler="Descripción Lista"> </textarea>
        </div>
        
        <div>
            <button type="submit" >Crear Lista </button>
        </div>
    </form>
@endsection