@extends('layouts.app')

@section('content')
<h1>Edit Item </h1>



{{ Form::open(['action' => ['ItemsController@update', $id] , 'method'=> 'POST']) }}
<table class="table table-striped table-dark">
    <thead>
    <tr>
      <th scope="col">Item name</th>
      <th scope="col">Link</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>      
        <td>
        {{Form::text('name', '$item->name', ['class' => 'form-control', 'placeholder' =>'Name'])}}
        </td> 
        <td>
        {{Form::text('link', '{!!$item->link!!}', ['class' => 'form-control', 'placeholder' =>'Link'])}}
        </td>
        <td>
        {{Form::text('price', '{{$item->price}}', ['class' => 'form-control', 'placeholder' =>'Price'])}}
        </td>
    </tr>    
  </tbody>
</table>

        <div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit', ['class'=>'btn btn-primary'])}}
        {{ Form::close() }} 
        
        </div>
@endsection