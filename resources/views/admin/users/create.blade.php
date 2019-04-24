@extends('admin.template.main')

@section('title','Crear Usuario')

@section('content')

   <!-- Formulario de creacion de usuario  --> 
    <!--                 uso la ruta store para hacer el post del formulario -->
    {!! Form::open(['route' => 'users.store','method'=> 'POST'])  !!}
        
    <!-- los datos que requiero son los del modelo  User.php  -->
        <div class="form-group {{$errors->has('name') ? 'is-danger':''}}" >
            {!! Form::label('name','Nombre')  !!}
            {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'value'=> "{{old('name')}}"])  !!}
        </div>


        <div class="form-group ">
                <label class="label" for="email">Email</label>

                <div class="form-group">
                        <textarea name="email" class="form-control {{$errors->has('email') ? 'is-danger':''}}">{{old('email')}}</textarea>
                </div>
        </div>


        <div class="form-group" {{$errors->has('password') ? 'is-danger':''}}>
                {!! Form::label('password','Password')  !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '*********', 
                'required'])  !!}
        </div>


        <div class="form-group">
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary'])  !!}
        </div>  

        @if ($errors->any())
                <div class="notification is-danger">
                        <ul>
                                @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach
                        </ul>
                </div>
        @endif

    {!! Form::close()  !!}
@endsection
