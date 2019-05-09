@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Lists</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    Edit {{$task->name}} list
                    <hr>
                    <form method="POST" action="{{ route('editList',$task->id)}}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name" value='{{$task->name}}' required>
                        </div>
                        <div class="col">
                            <input name="desc" id="desc" type="text" class="form-control" placeholder="Description" value='{{$task->desc}}' >
                        </div>
                        <div class="col">
                            <select id="genre" name="genre" class="form-control" >
                                <option selected>{{$task->genre}}</option>
                                @foreach($genres as $genre)
                                @if($genre->genre != $task->genre)
                                <option>{{$genre->genre}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select id="privacy" name="privacy" class="form-control">
                                <option selected>{{$task->privacy}}</option>
                                @if($task->privacy != "Public")
                                <option>Public</option>
                                @else
                                <option>Private</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Save</button>
                    </div>
                    </form>
                    
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






