@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="jumbotron">
                    <h1 class="display-4">Bienvenido al perfil de {{$user->name}}</h1>
                    <p class="lead">
                        Nickname: {{$user->nickname}}
                    </p>
                    <p class="lead">
                        Email: {{$user->email}}
                    </p>
                    <hr class="my-4">
                    <p>Gracias por tu visita.</p>
                </div>
            </div>
        </div>
    </div>
    <hr> 
    <div class="container">
        <h2>Listado de Partidos Creados</h2>
        <p>El siguiente listado corresponde con aquellos partidos que creo de forma pública.</p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Lugar</th>
                        <th>Categoria</th>
                        <th>Privacidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partidos as $partido)
                    <tr>
                        <td>{{$partido->name}}</td>
                        <td>{{$partido->place}}</td>
                        <td>{{$partido->category}}</td>
                        <td>{{$partido->public}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection