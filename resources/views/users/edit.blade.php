@extends('main')

@section('title','Editar Usuario')

@section('content')

    <br>
    <h1>Editar Usuario</h1>

    <!-- usa metodo             POST                    y on submit redirige a /admin/users  -->
    <!-- al completar el formulario voy a users.update y le paso el id de user  -->

    <form method="POST" action="{{ action('UsuariosController@update',$user->id) }}">
        {{  method_field('PATCH') }}
            {{ csrf_field() }}
        <div class="field">
            <label class="label" for="name">Nombre</label>
            <div class="control">
                <input type="text" class="input" name="name" value={{$user->name}}>
            </div>
        </div>

        <br>
        <div class="field">
                <label class="label" for="email">Email</label>
                <div class="control">
                    <input type="text" class="input" name="email" value={{$user->email}}>
                </div>
        </div>

        <br>
        <div class="field">
            <label class="label" for="ciudad">Ciudad</label>
            <div class="control">
                <input type="text" class="input" name="ciudad" value='{{$user->ciudad}}'>
            </div>
        </div>


        <br>
        <div>
                <button class="btn btn-success my-2 my-sm-0" type="submit">Aplicar cambios</button>
        </div>
    </form>
@endsection