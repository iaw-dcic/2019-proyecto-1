@extends('layout.appContent')

@section('titulo')
    Listas de {{$id}}
@endsection

@section('content')
 <h1> Listas </h1>
 
 <div class="list-group">
    @foreach($lista as $listas)
     
        <a href="/lists/{$list->id}" class="list-group-item list-group-item-action"> {{$lista->name}} </a> 
       
    @endforeach
 </div>
@endsection