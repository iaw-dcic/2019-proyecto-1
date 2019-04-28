@extends('layouts.app')

<head>
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
</head>

<body>

    <ul id='left-panel'>
        <li><a href="/profile">Mi Perfil</a></li>
        <li><a class="active" href='/myLists'>Mis Listas</a></li>
        <li><a href="/createList">Crear Lista</a></li>
        <li><a href="/settings">Configuración</a></li>
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

                            @foreach ($goals as $goal)
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
</body>