@extends('layout')

@section('content')

<div class="tareas">
    <div class="wrap">
            <ul class="lista" id="lista">
            @foreach($cocineros as $cocinero)
                <li>
                    <div class="row">
                        <div class="col-1">
                        <img src="{{ $cocinero->avatar}}"  alt= "{{$cocinero->nombre}}" height=100 width=100> 
                       </div>
                       <div class="col-9">
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