@extends('layout')

@section('content')

<div class="tareas">
    <div class="wrap">
            <ul class="lista" id="lista">
            @foreach($cocineros as $cocinero)
                <li>
                    <div class="row">
                        <div class="col-2">
                        @if($cocinero->avatar == null)
                        <img src="{{asset('img/usuario.png')}}"  alt= "{{$cocinero->nombre}}" height=100 width=100> 
                        @else
                        <img src="{{ $cocinero->avatar}}"  alt= "{{$cocinero->nombre}}" height=100 width=100> 
                        @endif
                    </div>
                       <div class="col-8 columnaDerecha">
                           <a  href="{{route('verPerfil',['id'=>$cocinero->id])}}">
                                {{$cocinero->nombre}}
                             </a>
                        </div>
                </li>
                @endforeach
            </ul>
        </div>
</div>



@stop