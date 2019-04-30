@extends('layouts.app')

@section('content')
<div class="container">
    @guest
     <h1>{{$user->name}}'s profile</h1>
     <hr>
    @else   
    <div class="jumbotron">
        <h1 class="display-5">{{$user->name}}</h1>
        <p class="lead">e-mail: {{$user->email}}</p>
        <p class="lead">nick: {{$user->nick}}</p>
        <hr class="my-5">
        @if($user->id == auth()->id())
        <p>Puede editar su perfil haciendo click en el siguiente enlace</p>
        <a class="btn btn-outline-dark btn-lg" href="#" role="button" onclick="location.href='/profile/{{$user->id}}/edit';">
            {{ __('Edit profile') }}
        </a>
        @endif
    </div>
    <hr>
    @endguest  
    <h3>Saved books:</h3>
    <div class="container">
        <table class="table table-hover task-table">
            <thead>
                <tr>
                <th scope="col">Code</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Editorial</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->cod}}</td>
                        <td>{{$task->title}}</td>
                        <td>{{$task->author}}</td>
                        <td>{{$task->editorial}}</td>
                    </tr>
                @endforeach     
            </tbody>
        </table>
    </div>

</div>
@endsection