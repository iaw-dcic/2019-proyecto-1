@extends('main')

@section('title','Editar Lista')

@section('content')
    <h1>Editar Lista</h1>


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

        <br>
        <div class="field">
                <label class="label" for="descripcion">Descripción</label>
                <div class="control">
                    <input type="text" class="input" name="descripcion" value='{{$lista->descripcion}}'>
                </div>
        </div>
    
        <br>
        <div class="field">
                <label class="label" for="descripcion">Visibilidad</label>
                <div class="control">
                    @if($lista->visible === 0)
                        <input type="radio" class="input" name="visible" value="2"> Pública 
                        <input type="radio" class="input" name="visible" value="0" checked> Privada <br>
                    @else
                        <input type="radio" class="input" name="visible" value="2" checked> Pública 
                        <input type="radio" class="input" name="visible" value="0" > Privada <br>
                    @endif
                </div>
        </div>

        <br>

        <div>
            <button class="btn btn-success my-2 my-sm-0" type="submit">Aplicar cambios</button>
        </div>

    </form>
@endsection