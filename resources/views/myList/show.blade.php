@extends('layouts.app')


<link rel="stylesheet" type="text/css" href="/css/profile.css">
<link rel="shortcut icon" type="image/png" href="\images\logo 150.png" sizes="64x64">

<ul id='left-panel'>
    <li><a href="/profile">Mi Perfil</a></li>
    <li><a class="active" href='/myLists'>Mis Listas</a></li>
</ul>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Lista: </b> {{ $lista->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <h2><b>{{ $lista->name }}</b></h2>
                    <table>
                        <tr id='titleTableGoal'>
                            <th>Autor</th>
                            <th>Equipo </th>
                            <th>Equipo Rival </th>
                            <th>Año</th>
                        </tr>

                        @foreach ($lista->goals as $goal)
                        <tr>
                            <td>{{ $goal->autor }}</td>
                            <td>{{ $goal->equipo }}</td>
                            <td>{{ $goal->equipo_rival }}</td>
                            <td>{{ $goal->anio }}</td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection