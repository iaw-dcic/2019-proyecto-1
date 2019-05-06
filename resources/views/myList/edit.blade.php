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
                <div class="card-header"><b>Editar: </b> Lista {{ $lista->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="/myList/{{$lista->id}}">
                        @method('PATCH')
                        @csrf

                        <table>
                            <tr>
                                <th>Nuevo nombre de lista</th>
                                <th> Pública </th>
                                <th></th>
                            </tr>

                            <tr>
                                <td> <input type='text' name='name' value="{{ $lista->name }}"> </td>
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
                                <td><input type='text' name='autor' size="10px" placeholder=" Autor" required value="{{old('autor')}}"></td>
                                <td><input type='text' name='equipo' size="8px" placeholder=" Equipo" required value="{{old('equipo')}}"></td>
                                <td><input type='text' name='equipo_rival' size="10px" placeholder=" Equipo rival" required value="{{old('equipo_rival')}}"></td>
                                <td><input type='int' name='año' size="5px" placeholder=" Año" required value="{{old('año')}}"></td>
                                <td><button class='btn-primary' type='submit'> Agregar </button></td>
                            </tr>
                    </form>

                    @foreach ($lista->goals as $goal)
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
                    @if ($errors->any())
                    <p></p>
                    <div class="alert  alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection