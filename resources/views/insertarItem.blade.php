@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-custom text-center titulo"> {{ $datos[0]->name }}</div>
                <div class="panel-body panel-body-custom colorFondo">

                <div class="text-center titulo tituloBlanco wellItem"><h2>Items</h2></div><br>
                   <div class="flex-container">
                     @foreach ($datos[1] as $item)
                        <div class="gallery">
                            <a href="#">
                                <img src="#" alt="{{ $item->name }}" width="400" height="250">
                            </a>
                            <div class="desc">
                                <h6 class="tituloCard">{{ $item->name }}</h6>
                                <p>{{ $item->description }}</p>
                                <p><span class="negrita">Año de edición:</span> {{ $item->edicion }}</p>
                                <p><span class="negrita">Nro de Páginas:</span> {{ $item->nroPaginas }}</p>
                            </div>
                        </div>
                       @endforeach 
                     
                   </div>
               
                </div>


                    <form class="form-horizontal colorFondo" action="/{{ Auth::user()->id }}/{{ $datos[0]->id }}/insertarItem" method="POST">
                      @csrf
                      
                      <div class="text-center titulo tituloBlanco wellItem margen"><h2>Añadir nuevo Item</h2></div><br>
                      <div class="form-group row">
                            <label for="nameItem" class="col-md-3 col-form-label text-md-right control-label"> Título del Comic: </label>

                            <div class="col-md-6">
                                <input id="nameItem" type="text" class="form-control-custom" name="nameItem" value="{{ old('nameItem') }}" required autofocus>
                            </div>

                      </div>
                      <div class="form-group row">
                        <label for="desItem" class="col-md-3 col-form-label text-md-right control-label"> Descripción: </label>

                        <div class="col-md-6">
                            <textarea id="desItem" class="form-control-custom" rows="3" name="desItem" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                            <label for="nroPag" class="col-md-3 col-form-label text-md-right control-label"> Número de Páginas: </label>

                            <div class="col-md-6">
                                <input id="nroPag" type="text" class="form-control-custom" name="nroPag" value="{{ old('nameItem') }}" required>
                            </div>

                      </div>

                      <div class="form-group row">
                            <label for="edicion" class="col-md-3 col-form-label text-md-right control-label"> Año de Edición: </label>

                            <div class="col-md-6">
                                <input id="edicion" type="text" class="form-control-custom" name="edicion" value="{{ old('nameItem') }}" required>
                            </div>

                      </div>

                      <div class="form-group row">
                          <label for="imgPortada" class="col-md-3 col-form-label text-md-right control-label"> Imagen de Portada: </label>

                          <div class="col-md-6">
                              <input type="file" id="imgPortada" class="form-control-custom" name="imgPortada">
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger btn-block">
                                    Añadir Item
                                </button>
                            </div>
                        </div>
                    </form>
                    @if($datos[0]->estado === 0)
                        <form class="colorFondo" action="/{{ Auth::user()->id }}/{{ $datos[0]->id }}/insertarItem" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                            <div class="form-group row mb-0">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-danger btn-block">
                                            Compartir Colección
                                        </button>
                                    </div>
                                </div>

                        </form>
                    
                    @else 
                        <form class="colorFondo" action="/{{ Auth::user()->id }}/{{ $datos[0]->id }}/insertarItem" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                            <div class="form-group row mb-0">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-danger btn-block">
                                            Dejar de Compartir Colección
                                        </button>
                                    </div>
                                </div>

                        </form>
                        
                    
                    @endif
                    <form class="colorFondo" action="/{{ Auth::user()->id }}/{{ $datos[0]->id }}/insertarItem" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                        <div class="form-group row mb-0">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger btn-block">
                                        Eliminar Colección
                                    </button>
                                </div>
                            </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection