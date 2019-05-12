@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Public</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    Public section
                    <hr>
                    <table class="table table-hover task-table">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Genre</th>
                        <th scope="col">OWNER</th>
                        <th scope="col"></th>
                        </tr>
                       
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->name}}</td>
                            <td>{{$task->desc}}</td>
                            <td>{{$task->genre}}</td>
                            <td>
                                <form method= "GET" action="{{route('showPublicProfile',$task->owner_id)}}">
                                    @csrf
                                    <button class="btn btn-outline-dark" >{{$task->owner_name}}</button>
                                </form>
                            </td>
                            <td>
                                <form method= "GET" action="/list/{{$task->id}}">
                                    @csrf
                                    <button class="btn btn-outline-dark" >Open list</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
