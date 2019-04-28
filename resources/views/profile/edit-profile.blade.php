@extends('layouts.appIndex')

@section('contenido')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="m 5 p 5">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Page Features -->
    <div class="container">
        <div class="row text-center">
            <form class="form-group" method="POST" action="/profiles">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{$profile->Nombre}}">
                </div>
                <div class="form-group">
                    <label for="Apellido">Apellido</label>
                    <input type="text" class="form-control" name="surname" value="{{$profile->Apellido}}">
                </div>
                <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input type="text" class="form-control" name="city" value={{$profile->Ciudad}}>
                </div>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>

        </div>
        <div class="row">
                <form  method="get"  class="form-group" action="{{route('listaLibros')}}">
                    <button type ="submit" class ="btn btn-secondary"  >
                            Administrar listas
                    </button>            
                </form>
        </div>
    </div>
    
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection  