@extends('layouts.app')

@section('content')
    <div class="card">
        <h4 class="card-header"> Editar Lista </h4>
    <div class="card-body">



            <form method="PUT" action="{{ route('users.updateLista',$list->id) }}">
                {{-- Enviamos un campo oculto --}}
                {{ csrf_field() }} <!--Laravel nos protoge para evitar que un sitio malicioso envia solicitudes post a nuestra app pidiendo este token-->

                <!--Uso Boostrap-->
                <div class="form-group">
                        <!-- Label usa el id del input --> <!-- el campo name es el que usa el metodo post en el controlador para crear el usuario -->
                        <label for="name">Nombre de la lista a crear:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Mi Lista" value="{{ old('name',$list->name) }}">
                        @if($errors->has('name'))
                        <div class="alert alert-danger">
                            <p>{{ $errors->first('name') }}</p>
                        </div>
                        @endif

                </div>
                <div class="form-check">
                        <!-- Label usa el id del input --> <!-- el campo name es el que usa el metodo post en el controlador para crear el usuario -->
                        <div class="form-check">
                            @if(old('isPublic',$list->isPublic==1))
                                <input type="checkbox" class="form-check-input" id="isPublic" name="isPublic" checked>
                            @else
                                <input type="checkbox" class="form-check-input" id="isPublic" name="isPublic">
                            @endif
                                <label class="form-check-label" for="exampleCheck1">Es pública</label>
                         </div>
                </div>

                <div>

                    </div>
                        <button type="submit" class = "btn btn-primary">Guardar Lista</button>

                </div>
            </form>
            </div>
    </div>


@endsection
