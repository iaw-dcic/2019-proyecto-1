@extends('layouts.app')

@section('content')
<h1> Create New Collection </h1>
{{ Form::open(['action' => 'PostsController@store', 'method'=> 'POST']) }}


<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Title</th>      
    </tr>
  </thead>
  <tbody>
    <tr>    
        <td>
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' =>'Title' ])}}
        </td>       
    </tr>
    
  </tbody>
  <thead>
    <tr>
      <th scope="col">Item name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>      
        <td>
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' =>'Name' ])}}
        </td> 
        <td>
        {{Form::text('link', '', ['class' => 'form-control', 'placeholder' =>'Link' ])}}
        </td>
        <td>
        {{Form::text('price', '', ['class' => 'form-control', 'placeholder' =>'Price' ])}}
        </td>
    </tr>
    
  </tbody>
</table>

        <div>
        {{Form::submit('AddRow', ['class'=>'btn btn-primary'])}}
        {{ Form::close() }} 
        <div>
        {{ Form::open(['action' => ['PostsController@store'] , 'method'=> 'POST', 'class' =>'pull-right']) }}
                {{Form::submit('Submit', ['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}  
        </div>
        </div>
@endsection