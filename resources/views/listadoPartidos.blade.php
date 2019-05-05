@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Partidos Creados</h2>
    <p>El siguiente listado corresponde con aquellos partidos que creo como usuario en el sistema.</p>
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
                    <td>
                    <td>
                        <form action="/listadoPartidos/{{$partido->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button>Delete</button>
                        </form>
                    </td>
                    <td> 
                        <button type="button" onclick="window.location='/edit/{{$partido->id}}'">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection