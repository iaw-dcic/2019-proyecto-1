@extends('main')

@section('title','Editar Lista')

@section('content')
    <h1>Editar Lista</h1>

    @if(Session::has('flash_message'))
    {{Session::get('flash_message')}}
    @endif

     <!-- Mensaje flash  --> 
     @if ($errors->any())
     <div class="alert  alert-danger" role="alert">
             <ul>
                     @foreach($errors->all() as $error)
                             <li>{{ $error }}</li>
                     @endforeach
             </ul>
     </div>
     @endif

    <!-- usa metodo             POST                    y on submit redirige a /listas  -->

    <!-- al completar el formulario voy a listas.update y le paso el id de lista  -->

    <form method="POST" action="{{ action('ListasController@update',$lista->id) }}">
            {{  method_field('PATCH') }}
            {{ csrf_field() }}
        <div class="field">
            <label class="label" for="nombre">Nombre Lista</label>
            <div class="control">
                <input type="text" class="input" name="nombre" value='{{$lista->nombre}}'>
            </div>
        </div>

        <div class="field">
                <label class="label" for="descripcion">Descripcion</label>
                <div class="control">
                    <input type="text" class="input" name="descripcion" value={{$lista->descripcion}}>
                </div>
        </div>
    

        <div class="field">
                <div class="control">
                    <button type="submit" class="button"> </button>
                </div>
            </div>

    </form>
@endsection