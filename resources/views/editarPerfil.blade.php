@extends('layouts.app')

@section('opcionesNavBar')
<li class="nav-item">
    <a class="nav-link" href='/home'>Volver</a>
</li>
@endsection

@section('content')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1> Datos personales actuales</h2>
                </div>
                <div class="panel-body">
                    <form action="/editarPerfil/{{ $user->id }}" method="POST" class="form-horizontal">
                        <!--Para que funcione el formulario tiene que tener esto-->
                        @csrf
                        <!-- Display Validation Errors -->
                        @include('errors')
                        <!--Nombre del usuario-->
                        <div class="form-group">
                            <label for="inputName">Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" value='{{$user->name}}'>
                        </div>
                        <div class="form-row">
                            <!--NickName-->
                            <div class="form-group col-md-6">
                                <label for="inputNickname">Nickname</label>
                                <input type="text" name="nickname" class="form-control" id="nickname" value='{{$user->nickname}}'>
                            </div>
                            <!--Email-->
                            <div class="form-group col-md-6">
                                <label for="inputNickname">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value='{{$user->email}}'>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection('content')