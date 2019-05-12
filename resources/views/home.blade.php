@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Lists</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    ADD ALL LIST YOU WANT
                    <hr>
                    <form method="POST" action="{{ route('addList')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="col">
                            <input name="desc" id="desc" type="text" class="form-control" placeholder="Description" >
                        </div>
                        <div class="col">
                            <select id="genre" name="genre" class="form-control">
                                @foreach($genres as $genre)
                                <option selected>{{$genre->genre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select id="privacy" name="privacy" class="form-control">
                                <option selected>Public</option>
                                <option>Private</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Save</button>
                    </div>
                    </form>
                    
                    <hr>
                    <table class="table table-hover task-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Privacy</th>
                            <th scope="col">Public/Private</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>
                                    <form method= "GET" action="/list/{{$task->id}}">
                                        @csrf
                                        <button class="btn btn-outline-dark" >Open list</button>
                                    </form>
                                </td>
                                <td>{{$task->name}}</td>
                                <td>{{$task->desc}}</td>
                                <td>{{$task->genre}}</td>
                                <td>{{$task->privacy}}</td>
                                <td>
                                    <form method= "POST" action="{{route('changeVisibility', $task->id)}}">
                                        @csrf
                                        <button class="btn btn-outline-dark" >Change Privacy</button>
                                    </form>
                                </td>
                                <td>
                                    <form  method="GET" action ="{{route('getEditList',$task->id)}}" >
                                        @csrf
                                        <button class="btn btn-outline-dark" >Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form  method="POST" action ="/home/{{$task->id}}" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-dark" >X</button>
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






