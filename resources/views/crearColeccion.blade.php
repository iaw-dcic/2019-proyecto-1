@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-custom text-center titulo"> Crear nueva colección de Comics</div>
                <div class="panel-body panel-body-custom">
                    <form class="form-horizontal" action="/{{ Auth::user()->id }}/crearColeccion" method="POST">
                      @csrf

                      <div class="form-group row">
                            <label for="nameColec" class="col-md-3 col-form-label text-md-right control-label"> Nombre de la Colección: </label>

                            <div class="col-md-6">
                                <input id="nameColec" type="text" class="form-control-custom" name="nameColec" value="{{ old('nameColec') }}" required autofocus>
                            </div>

                      </div>
                      <div class="form-group row">
                        <label for="desColec" class="col-md-3 col-form-label text-md-right control-label"> Descripción: </label>

                        <div class="col-md-6">
                            <textarea id="desColec" class="form-control-custom" rows="3" name="desColec" required></textarea>
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
                                    Crear Colección
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