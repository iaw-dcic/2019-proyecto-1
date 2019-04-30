@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    Add some Book to your list
                    <hr>
                    <form method="POST" action="{{ route('addItem')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <input name="cod" id="cod" type="number" min="1" class="form-control" placeholder="Code" required>
                        </div>
                        <div class="col">
                            <input name="title" id="title" type="text" class="form-control" placeholder="Title" required>
                        </div>
                        <div class="col">
                            <input name="author" id="author" type="text" class="form-control" placeholder="Author" required>
                        </div>
                        <div class="col">
                            <input name="editorial" id="editorial" type="text" class="form-control" placeholder="Editorial" required>
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
                            <th scope="col">ID</th>
                            <th scope="col">Code</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Editorial</th>
                            <th scope="col">Privacy</th>
                            <th scope="col">Public/Private</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->cod}}</td>
                                <td>{{$task->title}}</td>
                                <td>{{$task->author}}</td>
                                <td>{{$task->editorial}}</td>
                                <td>{{$task->privacy}}</td>
                                <td>
                                    <form method= "POST" action="{{route('changeVisibility',$task->id)}}">
                                        @csrf
                                        <button class="btn btn-outline-dark" >Change Privacy</button>
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






