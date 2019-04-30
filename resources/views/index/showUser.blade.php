@extends('index.layout')


@section('content')

 <h1> <p class="font-weight-bolder"> User: {{$user-> usuario}} </p> </h1> 

    <div>
     <h4>Nombre: {{$user -> name}} </h4>
     <h4>Apellido: {{$user -> apellido}} </h4>
       
    </div>
  

@endsection

