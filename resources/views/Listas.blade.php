@extends('layouts.appContent')

@section('titulo')
    Listas de {{$user->name}}
@endsection

@section('extraStyles')
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link href="{{asset('css/publicListsStyle.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="d-flex flex-column">
    @if(!$listas->isEmpty())
    <div class="list-group">
        @foreach($lista as $listas)
            <li><a href="{{route('lists/{list->id}') }}" class="list-group-item list-group-item-action">
            {{$lista->titulo}}</a> </li>
        @endforeach
    </div>
        
    @else  
        <div class="alert alert-primary divAlerta" role="alert">
            <h4 class="alert-heading">Nada que ver por aquí</h4>
               <p class="mb-0"> No hay Listas para ver, porque no creas una? <p>
        </div>
    @endif

    <a href="/lists/crear" class="btn btn-outline-info">Agregar Lista</button>
</div>
@endsection