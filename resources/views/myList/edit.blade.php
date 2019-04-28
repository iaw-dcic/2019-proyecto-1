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
                    <div class="card-header"><b>Editar: </b> Lista {{ $lista->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="/myList/{{$lista->id}}">
                            <!-- debe ir al show() -->
                            @method('PATCH')
                            @csrf

                            <table>
                                <tr>
                                    <th>Nuevo nombre de lista</th>
                                    <th> Pública </th>
                                    <th></th>
                                </tr>

                                <tr>
                                    <td> <input type='text' name='nameList' placeholder="{{ $lista->name }}"> </td>
                                    <td> <label class="switch">
                                            @if($lista->public)
                                            <input type="checkbox" name='public' checked value=1;>
                                            @else
                                            <input type="checkbox" name='public'>
                                            @endif

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td> <button class='btn-primary' type='submit'> Actualizar </button></td>
                                </tr>
                            </table>
                        </form>

                        <title><b>Goles</b></title>
                        <form method="POST" action="/myList/{{ $lista->id }}/edit">
                            @csrf
                            <table>
                                <tr id='titleTableGoal'>
                                    <th>Autor</th>
                                    <th>Equipo </th>
                                    <th>Equipo Rival </th>
                                    <th>Año</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><input type='text' name='autorGoal' size="10px" placeholder=" Autor"></td>
                                    <td><input type='text' name='equipoGoal' size="8px" placeholder=" Equipo"></td>
                                    <td><input type='text' name='equipo_rivalGoal' size="10px" placeholder=" Equipo rival"></td>
                                    <td><input type='int' name='anioGoal' size="5px" placeholder=" Año"></td>
                                    <td><button class='btn-primary' type='submit'> Agregar </button></td>
                                </tr>
                        </form>

                        @foreach ($goals as $goal)
                        <tr>
                            <td>{{ $goal->autor }}</td>
                            <td>{{ $goal->equipo }}</td>
                            <td>{{ $goal->equipo_rival }}</td>
                            <td>{{ $goal->anio }}</td>
                            <td>
                                <form method="POST" action="{{ $goal->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <button id='delete' type='submit'> Eliminar </button>
                                </form>
                            </td>
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