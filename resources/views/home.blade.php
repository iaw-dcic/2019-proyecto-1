@extends('main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">MyMusic</h2>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido!!  <br>
                        @if(Auth::user() != null)
                                             Usuario: {{ Auth::user()->name}}
                        @else
                                             Usuario: Invitado 
                        @endif
                </div>
            </div>

            <br>
            <a href="{{ action('ListasController@index') }}" class="btn btn-primary">Ver Listas Públicas</a>
            <br> <br>
            <a href="{{ action('ListasController@indexPriv') }}" class="btn btn-primary">Ver Listas Privadas</a>
        </div>
    </div>
</div>
@endsection
