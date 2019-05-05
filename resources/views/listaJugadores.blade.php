@extends('layouts.app')

@section('content')
<div section>
    <div class="container">
        <h2> Jugadores registrados del Partido {{$partido->name}}</h2>
        <div id='#ListasPublicas'>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre Jugador</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($jugadores as $jugador)
                    <tr>
                        <td>{{$jugador->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection