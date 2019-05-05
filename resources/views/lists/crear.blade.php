@extends('layouts.app')

@section('titulo')
    Creemos una Lista
@endsection

@section('content')
    <h1 class="text-center"> Crea una nueva lista aquí! </h1>


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('llena los datos de tu lista aquí!') }}</div>
                <div class="card-body">
                    <form method="POST" action="/lists">
                        @csrf
                        <div class="form-group">
                            <label for="list_title">Titulo de la lista</label>
                            <input type="text" class="form-control" id="list_title" aria-describedby="listHelp" 
                                placeholder="Ingresa el nombre de la lista" name="name" required value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="list_description">Descripcion</label>
                            <input type="text" class="form-control" id="list_description" aria-describedby="list_description" placeholder="Ingresa una descripcion" 
                                name="listaDescripcion" required value="{{old('listaDescripcion')}}">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="publicList" name='public' {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="publicList">será la Lista Publica?</label>
                            <small id="publicList" class="form-text text-muted">si esto esta activo, tu lista podrá ser vista por otros usuario e invitados</small>
                        </div>
                        <div>
                           <input type="hidden" name="userID" value="{{Auth::user()->id}}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" >Crear Lista </button>
                        </div>


                    @if($errors->any())
                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <img src="..." class="rounded mr-2" alt="...">
                                <strong class="mr-auto">Error al ingresar los datos</strong>
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                               @foreach($errors->all() as $error)
                                    <li>{{$error}} </li>
                               @endforeach
                            </div>
                        </div>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection