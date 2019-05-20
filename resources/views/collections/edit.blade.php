@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif


<div class="row mt-2">
    <div class="col-2 text-center px-5">
        <h3>Crear Post</h3>
        {!! Form::open(['action'=>['CollectionsController@update',$collection->id], 'method'=>'POST'])!!}
        <div class="form-group">
            {{Form::label('collection_name','Titulo')}}
            {{Form::text('collection_name', $collection->collection_name,['class'=>'form-control','placeholder'=>'Nombre de la Lista'])}}
        </div>
        <div class="form-group">
            {{Form::label('public','Lista Publica:')}}
            @if ($collection->is_public==true)
            {{Form::checkbox('public',true,['checked'])}}
            @else
            {{Form::checkbox('public',true)}}
            @endif
        </div>

        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Actualizar', ['class'=>'btn btn-primary'])}}
        {!!Form::close()!!}

        <br>
        <hr>
        <br>

        <h3>Crear Post</h3>
        {!! Form::open(['action'=>['PostsController@store'], 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('title','Titulo')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Titulo','required'])}}
        </div>
        <div class="form-group">
            {{Form::label('comentario','Comentario')}}
            {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Comentario', 'maxlength'=>200,'rows'=>3,'required'])}}
            {{Form::hidden('collection_id', $collection->id) }}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>

        {{Form::submit('Crear', ['class'=>'btn btn-success'])}}
        {!!Form::close()!!}

        <br>
        <hr>
        <br>
        {!!Form::open(['action'=>['CollectionsController@destroy',$collection->id], 'method'=>'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Eliminar Lista', ['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}

    </div>
    <div class="col p-0">
        {{-- Aca muestro la colección de imagenes --}}
        @if (count($collection->posts)>0)
        <div class="d-flex flex-wrap justify-content-around">

            @foreach ($collection->posts as $post)

            <div class="card m-2" style="width: 30rem;">
                <img class="card-img-top"
                    src="{{Cloudder::show($post->cover_image, ['width'=>'1.0', 'height'=>'1.0', 'format'=>'jpg'])}}"
                    alt="Card image cap">
                <div class="card-body">
                    <div class="card-text">
                        <h5>{{$post->title}}</h5>
                        <p>{{$post->body}}</p>
                        <small>Subido por <a href="user/{{$collection}}"></a>{{$collection->user->name}}</a></small>
                    </div>
                    {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Eliminar', ['class'=>'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
            @endforeach

        </div>
        @else
        <h2>En este momento no hay imágenes.</h2>
        @endif

    </div>


</div>

@endsection