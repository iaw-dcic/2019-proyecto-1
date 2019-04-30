@extends('layouts.app')


@section('titulo')
    Editemos una Lista
@endsection

@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('cambia los dators de tu lista aquí!') }}</div>

                <div class="card-body">
                    <form method="POST" action="/lists/{$list->id}">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="listId" value="{{$list->id}}">
                        <div>
                            <span class="input-group-addon" id="basic-addon1">Nombre actual de la lista: {{$list->name}}</span>
                            <input type="text" class="form-control" placeholder="Nombre Lista" aria-describedby="basic-addon1" name="titulo" required>
                        </div>
                        <div>
                            <span class="input-group-addon" id="basic-addon2">descripcion actual de la lista: {{$list->description}}</span>
                            <input type="text" class="form-control" placeholder="Descripción Lista" aria-describedby="basic-addon2" name="listaDescripcion" required>
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" aria-label="..." name="public">
                            <span class="input-group-addon" id="basic-addon3">deseas que la lista sea publica? </span>
                        </div><!-- /.col-lg-6 -->
                        <div>
                           <input type="hidden" name="userID" value="{{Auth::user()->id}}">
                        </div>
                        <div class="btn-group" role="group" aria-label="form buttons">
                          
                        <div>
                            <button type="submit" class="btn btn-primary" >Guardar cambios </button>
                        </div>
                    </form>

                        <form method="POST" action="/lists/{{$listaId}}">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="listId" value="{{$list->id}}">
                            <button type="submit" class="btn btn-danger" >Borrar Lista </button>
                        </form>

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