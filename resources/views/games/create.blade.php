@extends('layout.appContent')

@section('titulo')
    Creemos un Juego
@endsection

@section('content')
<h1> Crea una nueva lista aquí! </h1>


<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('llena los datos de tu juego aquí!') }}</div>

            <div class="card-body">
                <form method="POST" action="/profile">
                    @csrf
                    <div>
                        <span class="input-group-addon" id="basic-addon1">{{__('Name')}}</span>
                        <input type="text" class="form-control" placeholder="Nombre Lista" aria-describedby="basic-addon1" name="name" required>
                    </div>
                    <div>
                        <span class="input-group-addon" id="basic-addon2">{{__('Descripción')}}</span>
                        <input type="text" class="form-control" placeholder="Descripción Lista" aria-describedby="basic-addon2" name="genre" required>
                    </div>
                    <div>
                        <span class="input-group-addon" id="basic-addon2">{{__('Descripción')}}</span>
                        <input type="text" class="form-control" placeholder="Descripción Lista" aria-describedby="basic-addon2" name="company" required>
                    </div>
                    <div>
                        <span class="input-group-addon" id="basic-addon2">{{__('Descripción')}}</span>
                        <input type="text" class="form-control" placeholder="Descripción Lista" aria-describedby="basic-addon2" name="genre" required>
                    </div>
                    <div>
                       <input type="hidden" name="userID" value="{{Auth::user()->id}}">
                    </div>
                    <div>
                        <button type="submit" >Crear Lista </button>
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
endsection