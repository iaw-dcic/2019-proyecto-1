@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CREAR LISTA</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{url('lista/crear')}}">
                        {{csrf_field()}}
                        <p><label for='nombre'>Nombre: </label> <input type="text" name="nombre"></p>
                        <p><label for='visible'>Visible:</label> <input type="checkbox" name="visible"></p>
                        <button type="submit">Crear Lista</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection