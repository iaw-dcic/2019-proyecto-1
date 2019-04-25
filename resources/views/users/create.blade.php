@extends('main')

@section('title','Crear Usuario')

@section('content')


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

   <!-- Formulario de creacion de usuario  --> 
    <!--                 uso la ruta store para hacer el post del formulario -->
    <form method="POST" action="/admin/users">
                {{ csrf_field() }}
            <div class="field">
                <label class="label" for="name">Nombre</label>
                <div class="control">
                <input type="text" class="input {{ $errors->has('name')? 'is-danger' :'' }}" name="name" value={{$user->name}}>
                </div>
            </div>
    
            <div class="field">
                    <label class="label" for="email">Email</label>
                    <div class="control">
                        <input type="text" class="input {{ $errors->has('email') ? 'is-danger' :''}}" name="email" value={{$user->email}}>
                    </div>
            </div>
        
    
            <div class="field">
                    <div class="control">
                        <button type="submit" class="button btn-submit"> </button>
                    </div>
                </div>
    
        </form>
@endsection
