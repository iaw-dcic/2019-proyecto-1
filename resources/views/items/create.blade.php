@extends('layouts.app')

@section('content')
<h1> Create New Collection </h1>
<table class="table table-striped table-dark">
    <thead>
    <tr>
      <th scope="col">Item name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $item)
    <tr>      
        <td>{{$item->name}}</td>
        <td>{{$item->desc}}</td>
        <td>{{$item->price}}</td> 
    </tr>
    @endforeach
  </tbody>
</table>


{{ Form::open(array('action' => array('ItemsController@store', $post_id))) }}
<table class="table table-striped table-dark">
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
    <div style="display: none;">
    {{ Form::input('text','post_id', $post_id) }}
    </div>
    
  </tbody>
</table>

        <div>
        {{Form::submit('Add New Item', ['class'=>'btn btn-primary'])}}
        {{ Form::close() }} 
        <a href= "/home" class = "btn btn-default">Save Collection</a>
        </div>
@endsection