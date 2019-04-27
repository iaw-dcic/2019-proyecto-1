@extends('layout.appContent')

@section('titulo')
    Listas
@endsection

@section('content')
 <h1> Listas </h1>
 
 <div class="list-group">
    @foreach($lists as $list)
     
        <a href="/lists/{{$list->id}}" class="list-group-item list-group-item-action"> {{$list->name}} </a> 
       
    @endforeach
 </div>
@endsection