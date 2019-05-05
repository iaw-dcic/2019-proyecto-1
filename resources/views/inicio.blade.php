@extends('layouts.app')

@section('content')
<div section>
    <div class="container">
        <h2> Partidos públicos</h2>
        <div id='#ListasPublicas'>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Lugar</th>
                        <th>Categoria</th>
                        <th>Privacidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partidos as $partido)
                    <tr>
                        <td>{{$partido->id}}</td>
                        <td>{{$partido->name}}</td>
                        <td>{{$partido->place}}</td>
                        <td>{{$partido->category}}</td>
                        <td>{{$partido->public}}</td>
                        <td>
                            <button type="button" onclick="window.location='/jugadores/{{$partido->id}}'">Ver jugadores</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection