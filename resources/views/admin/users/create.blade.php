@extends('admin.template.main')

@section('title','Crear Usuario')

@section('content')

   <!-- Formulario de creacion de usuario  --> 
    <!--                 uso la ruta store para hacer el post del formulario -->
    {!! Form::open(['route' => 'users.store','method'=> 'POST'])  !!}
        
    <!-- los datos que requiero son los del modelo  User.php  -->
        <div class="form-group">
            {!! Form::label('name','Nombre')  !!}
            {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 
            'required'])  !!}
        </div>


        <div class="form-group">
                {!! Form::label('email','Email')  !!}
                {!! Form::email('email',null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 
                'required'])  !!}
        </div>


        <div class="form-group">
                {!! Form::label('password','Password')  !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '*********', 
                'required'])  !!}
        </div>


        <div class="form-group">
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary'])  !!}
        </div>    
    {!! Form::close()  !!}
@endsection
