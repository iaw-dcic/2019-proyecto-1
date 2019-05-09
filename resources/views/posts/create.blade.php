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
        <td>
        {{Form::submit('Submit', ['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}  
        </div>
        </td>      
    </tr>
    
  </tbody>
  </table>
@endsection