@extends('index.layout')


@section('content')

<h1> {{$user-> usuario}}  </h1>



@if($misListas->count())
    <div>
        
        @foreach($misListas as $thing)
        
             <h4>{{$thing -> title}} </h4>
            
       @endforeach
       
    </div>
    @endif

@endsection