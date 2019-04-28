@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    You can add some item to your stock
                    <hr>
                    <form method="POST" action="{{ route('addItem')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <input name="cod" id="cod" type="number" min="1" class="form-control" placeholder="Code" required>
                        </div>
                        <div class="col">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="col">
                            <input name="quantity" id="quantity" type="number" min="1" class="form-control" placeholder="Quantity" required>
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
                            <td>
                            
                            <form  method="POST" action ="/home/{{$task->id}}" >
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-dark" >X</button>
                            </form>
                            </td>
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






