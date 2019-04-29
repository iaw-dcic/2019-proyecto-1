@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
        <div class="row justify-content-around">
            <a class="btn btn-primary" href="/collections/create" role="button">Create Collection</a>
            <a class="btn btn-primary" href="/items/create" role="button">Create Item</a>
        </div>
        <div class="row justify-content-center">
            <div class="card w-75">
            @foreach ($collections as $collection)
                <div class="card-header d-flex justify-content-between">
                    <h1>{{$collection->name}}</h1>
                    @if (Auth::user()->id==$collection->user_id)
                        <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/collections/{{$collection->id}}/edit">Edit</a>
                                <div class="dropdown-divider"></div>
                                <button type="button" class="btn" data-toggle="modal" data-target="#deleteModal">
                                    Launch demo modal
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                @foreach ($items as $item)
                @if ($item->collection_id==$collection->id)
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between">
                            <h4>{{$item->name}}</h4>
                            @if (Auth::user()->id==$collection->user_id)
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/items/{{$item->id}}/edit">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <p class="card-text">{{$item->description}}</p>
                        <p class="card-text">${{$item->price}}</p>
                    </div></div>
                @endif
                @endforeach
            @endforeach
            </div>
        </div>
    </div>
@endsection