@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a class="btn btn-primary" href="/collections/create" role="button">Create Collection</a>
            <a class="btn btn-primary" href="/items/create" role="button">Create Item</a>
        </div>
        <hr>
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
                                <a class="dropdown-item" href="/collections/{{$collection->id}}/delete">Delete</a>
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
                                        <button type="button" class="btn dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/items/{{$item->id}}/edit">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="/items/{{$item->id}}/delete">Delete</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col">
                                <p class="card-text">{{$item->description}}</p>
                                <p class="card-text">${{$item->price}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
            </div>
        </div>
    </div>
@endsection