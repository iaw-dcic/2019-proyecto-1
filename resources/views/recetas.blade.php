@extends('layout')

@section('content')
 
<div class="recetas">
    <div class="wrap">
            <ul class="lista" id="lista">
            @foreach($recetas as $receta)
                <li>
                    <div class="row">
                        <div class="col-1">
                        @if($receta->imagen == null)
                        <a  href="{{route('receta',['nombre'=>$receta->nombre])}}">
                        <img src="{{asset('img/plato.png')}}"  alt= "{{$receta->nombre}}"  height=100 width=100> 
                        </a>
                        @else
                        <a  href="{{route('receta',['nombre'=>$receta->nombre])}}">
                        <img src="{{ $receta->imagen}}"  alt= "{{$receta->nombre}}" height=100 width=100> 
                        </a>
                        @endif
                    </div>
                       <div class="col-9 columnaDerecha">
                           <a  href="{{route('receta',['nombre'=>$receta->nombre])}}">
                                  {{$receta->nombre}}
                      
                             </a>
                            <hr>
                            <small>  <p> por : <a href="{{route('verPerfil',['id'=>$receta->autorId])}}"> {{$receta->autorId->nombre}}</a> </p>  </small>
                            <p> {{$receta->descripcion}} </p>
                        </div>
                </li>
                @endforeach
            </ul>
        </div>
</div>
 