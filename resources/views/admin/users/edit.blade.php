@extends('admin.template.main')

@section('title','Editar Usuario')

@section('content')
    <h1>Editar Usuario</h1>

    <!-- usa metodo             POST                    y on submit redirige a /admin/users  -->



    <!-- al completar el formulario voy a users.update y le paso el id de user  -->


    {!! Form::open(['route' => ['users.update',$user->id],'method'=> 'POST'])  !!}
        {{method_field('PATCH')}}
        
    <!-- los datos que requiero son los del modelo  User.php  -->
        <div class="form-group">
            {!! Form::label('name','Nombre')  !!}
            {!! Form::text('name',"$user->name", ['class' => 'form-control', 'required'])  !!}
        </div>


        <div class="form-group">
                {!! Form::label('email','Email')  !!}
                {!! Form::email('email',"$user->email", ['class' => 'form-control', 'required'])  !!}
        </div>


     


        <div class="form-group">
                {!! Form::submit('Aplicar nuevos cambios', ['class' => 'btn btn-primary'])  !!}
        </div>    
    {!! Form::close()  !!}

@endsection