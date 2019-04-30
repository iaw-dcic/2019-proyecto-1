@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Best Goals!</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p> Bienvenidos a <i>Best Goals!</i> </p>
                    <p> </p>
                    <p> Esta página almacena los goles más importarte para cada usuario.</p>
                    <p> Los goles se pueden almacenar en listas las cuales cada usuario puede decidir
                    si será pública o no. A la vez, una persona puede ver el perfil y las listas públicas
                    de los usuarios registrados.</p>
                    <p> </p>
                    <p> </p>
                    <p> Esta página fue creada por el estudiante <b>LUCAS MONZÓN</b> de la Universidad Nacional del Sur. </p>
                    <p> L:U 105336 </p>
                    <p> <i>Contacto:</i> <a href="http://monzon.lucas4@gmail.com"> monzon.lucas4@gmail.com</a></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection