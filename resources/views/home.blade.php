@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6><b>About</b></h6>
                            <p>
                                @if(($user->description)!= null)
                                {{$user->description}}
                                @else
                                No Information avaiable
                                @endif
                            </p>
                        </div>                       
                        <div class="col-md-12">
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>                                    
                                    @foreach($posts as $post)
                                                                               
                                        <tr>
                                        <td>
                                            <h3> <a href ="/posts/{{$post->id}}"> {{$post->title}}</a> </h3> 
                                            <small> Written on {{$post ->created_at}} by {{$post->user['name']}} </small>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>                
                <div class="tab-pane" id="edit">
                    {{ Form::open(['action' => ['HomeController@update', $user->id] , 'method'=> 'POST']) }}
                        <div class = "form-group">
                        {{Form::label('name', 'Name')}}
                        {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' =>'Name' ])}}
                        </div>
                        <div class = "form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' =>'Email' ])}}
                        </div>
                        <div class = "form-group">
                        {{Form::label('description', 'Description')}}
                        {{Form::textarea('description', $user->description, ['class' => 'form-control', 'placeholder' =>'Description' ])}}
                        </div>
                        
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                        
                    {!!Form::close()!!}   
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h6 class="mt-2">Upload a different photo</h6>
            <label class="custom-file">
                <input type="file" id="file" class="custom-file-input">
                <span class="custom-file-control">Choose file</span>
            </label>
        </div>
    </div>
</div>

@endsection

