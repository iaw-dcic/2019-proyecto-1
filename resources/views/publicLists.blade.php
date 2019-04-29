@extends('layouts.app')

@section('titulo')
    Listas Publicas
@endsection

@section('extraStyles')
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link href="{{asset('css/publicListsStyle.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-flex ">
    @if(!$InfoListas->isEmpty())
    <div class="list-group">
        @foreach($InfoListas as $elem)
            <a href="/lists/{{$elem->id}}" class="list-group-item list-group-item-action ">
            {{$elem->name}}</a> creada por <a href="profiles/{{$autores[$elem->name]}}"> {{$autores[$elem->name]}} </a> 
        @endforeach
    </div>
        
    @else  
        <div class="alert alert-primary divAlerta" role="alert">
            <h4 class="alert-heading">Nada que ver por aquí</h4>
               <p class="mb-0"> No hay Listas públicas para ver, vuelve más tarde! <p>
        </div>
    @endif
    </div>
@endsection