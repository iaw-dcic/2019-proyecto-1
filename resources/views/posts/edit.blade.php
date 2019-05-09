@extends('layouts.app')

@section('content')
@if(!Auth::guest())
            @if (Auth::user()->id == $post->user_id)
                <h1> Create Post </h1>
                {{ Form::open(['action' => ['PostsController@update', $post->id] , 'method'=> 'POST']) }}
                    <div class = "form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' =>'Title' ])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('Public')}}
                        {{Form::checkbox('rol', 'value')}}
                        <span class="help-block">{{ $errors->first('rol') }}</span>
                    </div>

                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!!Form::close()!!}
            @endif
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Item name</th>
                        <th scope="col">Link</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
            <tbody>
                    @foreach($items as $item)
                    <tr>      
                        <td>{{$item->name}}</td>
                        <td>{{$item->link}}</td>
                        <td>{{$item->price}}</td>
                        <td>
                         {{ Form::open(['action' => ['ItemsController@edit', $item->id] , 'method'=> 'POST']) }}
                            {{Form::submit('Edit', ['class'=>'btn'])}}
                            {{Form::hidden('_method', 'PUT')}}
                        {!!Form::close()!!}
      
                        <div class = 'float-right'>        
                        {{ Form::open(['action' => ['ItemsController@destroy', $item->id] , 'method'=> 'POST']) }}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </div>
                    </td> 
                    </tr>
                    @endforeach
            </tbody>
            </table>
@endif

@endsection
