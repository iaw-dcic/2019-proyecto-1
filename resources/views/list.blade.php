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
                    @guest
                    @else
                    @if($user->id == auth()->id())
                        Add some Book to your list
                        <hr>
                        <form method="POST" action= "/list/{{$task->id}}">
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

                            <button type="submit" class="btn btn-outline-dark">Save</button>
                        </div>
                        </form>
                    @endif
                    @endguest
                   
                    <hr>
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
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->cod}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->author}}</td>
                                <td>{{$item->editorial}}</td>
                                @if($user->id == auth()->id())
                                <td>
                                    <form  method="POST" action ="/list/{{$item->id}}" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-dark" >X</button>
                                    </form>
                                </td>
                                @endif
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