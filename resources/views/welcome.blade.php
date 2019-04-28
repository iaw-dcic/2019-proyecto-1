@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    See other public tasks
                    <hr>
                    <table class="table table-hover task-table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Code</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Privacy</th>
                        <th scope="col">OWNER</th>
                        </tr>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->cod}}</td>
                                <td>{{$task->name}}</td>
                                <td>{{$task->quantity}}</td>
                                <td>{{$task->privacy}}</td>
                                <td>{{$task->owner_id}}</td>
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
