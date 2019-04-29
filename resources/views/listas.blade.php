@extends('layout')
@section('content')
   <br> 
   <div class="tareas">
    <div class="wrap">
            <ul class="lista" id="lista">
            @foreach($listas as $lista)
             @if($lista->public)
                <li>
                  
                    <div class="row">

                       <div class="col-12">
                        
                             <h3 class="h3ListaNombre">   {{$lista->nombre}} </h3>
                             <h5>   <small>  <a href="{{route('verPerfil',['id'=>$lista->autorId])}}">por: {{$lista->autorId->nombre}} </a> </small> </h5>
                              <ul>
                             @foreach($recetas as $receta)
                               
                                @if($receta->listaId->id == $lista->id)
                                <li>
                                 <a href="{{route('receta',['nombre'=> $receta->nombre])}}" >{{$receta->nombre}}</a>
                                </li>
                                 @endif
                               
                            @endforeach
                            </ul>
                        </div>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
</div>
@stop