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
                        <th scope="col">ID</th>
                        <th scope="col">Code</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">OWNER</th>
                        </tr>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->cod}}</td>
                                <td>{{$task->title}}</td>
                                <td>{{$task->author}}</td>
                                <td>{{$task->editorial}}</td>
                                <td>{{$task->owner_name}}</td>
                            </tr>
                        @endforeach
                    </thead>
                    <tbody>
                  
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
