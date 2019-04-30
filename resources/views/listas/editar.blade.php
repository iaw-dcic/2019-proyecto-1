@extends('generales.layout')

@section('pageTitle', 'Editar Lista')

@section('estilos')
    <link rel='stylesheet' href='/css/listas/createLista.css'>
@stop

@section('body')

<div id= "panelfondo">
    <div class="card-header">Editar Lista</div>
        <div class="card-body">
            <form method="POST" action="{{ route('listas.update', $lista->id) }}" >
                {{csrf_field()}}
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nombre_lista">Nombre</label>
                        <input type="text" class="form-control" name="nombre_lista" value="{{ $lista-> nombre_lista }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="publica">¿Desea que sea Publica?</label>
                        <br>
                        @if ($lista->publica=="Si")
                            <input type="radio" name="publica"value="Si" checked>Si
                            <br>
                            <input type="radio" name="publica" value="No">No
                        @else
                            <input type="radio" name="publica"value="Si">Si
                            <br>
                            <input type="radio" name="publica" value="No"checked>No
                        @endif
                    </div>
                    
                </div>
            
                <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                
                <div id= "panelBoton">
                    <button type="submit" class="botonGuardar">Guardar</button>
                    <a href="{{ url('/') }}/miPerfil/{{ Auth::user()->id}}"><button class="botonGuardar" type="button">Volver</button></a>
                </div>
            </form>
        </div>
</div>

@stop