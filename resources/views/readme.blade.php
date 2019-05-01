@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="jumbotron">
                        <h1 class="display-4">Bienvenido</h1>
                        <p class="lead">
                            Esta página web fue creada para llevar un registro de la organización de tus partidos con amigos.
                            Permite configurar varias carácteristicas del mismo, tales como: nombre, lugar, categoría (Futbol,
                            Basquet, Volley, entre otras) y además te permite agregar jugadores.
                            También es posible realizar búsquedas ingresando como dato el 'nickname' del usuario que desea 
                            visualizar sus partidos públicos.
                            Luego de crear tu partido, podes publicarlo y compartirlo con tus amigos !!
                            
                        </p>
                        <hr class="my-4">
                        <p>Creador: Escudero Johanna Valeria estudiante de la Universidad Nacional del Sur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection