@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($user->avatar)
                        @if ($user->provider_name)
                            <img src="{{ $user->avatar }}" class="card-img-top" alt="avatar">
                        @else
                            <img src="/images/{{ $user->avatar }}" class="card-img-top" alt="avatar">
                        @endif
                    @endif
                    <div class="card-header"><h3>{{$user->name}}</h3></div>
                    <div class="card-body">
                        <p class="card-text">{{$user->description}}</p>
                        @if (!Auth::guest() && Auth::user()->id==$user->id)
                            <a href="./{{$user->id}}/edit" class="btn btn-primary">Edit profile</a>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="card w-75">
                    @foreach ($collections as $collection)
                        <div class="card-header d-flex justify-content-between">
                            <h1>{{$collection->name}}</h1>
                        </div>
                        @foreach ($items as $item)
                            @if ($item->collection_id==$collection->id)
                                <div class="card-body">
                                    <div class="card-title d-flex justify-content-between">
                                        <h4>{{$item->name}}</h4>
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
        </div>
    </div>
@endsection