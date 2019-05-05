@extends('layouts.app')

<!--Si inicio sesion agrega un mensaje de inicio de sesion-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mi Perfil</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
               

                <div class="jumbotron">
                    <h1 class="display-4">Hola {{$user->name}}</h1>
                    <p class="lead">Bienvenido a una página donde es posible registrar tu partido seleccionando la categoria y los jugadores. Luego puedes compartirlo
                        con tus amigos!
                    </p>
                    <hr class="my-4">
                    <p>Mejoramos tu organización.</p>
                    <a class="btn btn-primary btn-lg" href="/editarPerfil" role="button">Editar perfil</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection