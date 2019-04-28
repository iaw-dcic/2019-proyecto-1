@extends('layouts.appContent')

@section('titulo')
    Listas de {{$name}}
@endsection

@section('extraStyles')
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link href="{{asset('css/publicListsStyle.css')}}" rel="stylesheet">
@endsection

@section('content')
 <h1 class="text-center header"> Listas </h1>
 

 <div class="d-flex flex-column text-center">
    @if(!$listas->isEmpty())
    <div class="list-group">
        @foreach($listas as $elem)
            <a href="/lists/{{$elem->id}}" class="list-group-item list-group-item-action">
            {{$elem->name}}</a> 
        @endforeach
    </div>
        
    @else  
        <div class="alert alert-primary divAlerta" role="alert">
            <h4 class="alert-heading">Nada que ver por aquí</h4>
               <p class="mb-0 paragraph"> No hay Listas para ver, porque no creas una? <p>
        </div>
    @endif

    <a href="/lists/crear" class="btn btn-outline-info">Agregar Lista</a>
</div>
@endsection