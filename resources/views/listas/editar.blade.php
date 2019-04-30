@extends('generales.layout')

@section('pageTitle', 'Editar Lista')

@section('estilos')
    <link rel='stylesheet' href='/css/createLista.css'>
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
                        <input type="radio" name="publica"value="Si">Si
                        <br>
                        <input type="radio" name="publica" value="No">No
                    </div>

                    <div class="form-group col-md-12">
                        <label for="publica">¿Que serie desea agregar a su lista?</label>
                         @foreach($serie as $series)
                            <form method="POST" action="/actualizarIdLista/{{$series->id}}/{{$lista->id}}" >
                                {{csrf_field()}}
                                @method('PUT')
                                <div class="form-group col-md-6 " >
                                    <input type="checkbox" name="seriesSeleccionadas" value="id">{{$series->nombre}}
                                </div>
                            </form>
                            @endforeach
                    </div>
                    
                </div>
            
                <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                
                <div id= "panelBoton">
                    <button type="submit" class="botonGuardar">Guardar</button>
                    <a href="/miPerfil/{{ Auth::user()->id}}"><button class="botonGuardar" type="button">Volver</button></a>
                </div>
            </form>
        </div>
</div>

@stop