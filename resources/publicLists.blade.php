@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column">
    @if($lista.length != 0)
        @foreach($lista as $listas)
            <li> <span class="d-block p-2 bg-dark text-white">{{$lista->titulo}}</span>  </li>
        @endforeach
    @else
        <h1> No hay Listas públicas para ver, vuelve más tarde! </h1>
    @endif
    </div>
@endsection