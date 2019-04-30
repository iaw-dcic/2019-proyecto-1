@extends('index.layout')

@section('content')

	<h1 class = "title"> {{$thing -> title}}  </h1>

    @if($thing->items->count())
    <div>
        @foreach($thing-> items as $item)
            <li> {{$item -> title}}  </li>
        @endforeach

    </div>
    @endif

    
    
    
    

@endsection