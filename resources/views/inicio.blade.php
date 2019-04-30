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
                        <th>Creador</th>
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
                        <td>{{$partido->user_id}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection