@extends('index.layout')


@section('content')

<h1> Otro tambien viajan como vos!  </h1>



@if($misListas->count())
    <div>
        
        @foreach($misListas as $thing)
        <a href="/show/{{$thing -> usuario}}">
             <h2>{{$thing -> usuario}} </h2>
            </a> 
       @endforeach
       
    </div>
    @endif




@endsection