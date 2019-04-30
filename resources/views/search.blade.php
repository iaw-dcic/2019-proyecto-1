@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($users as $user)
            <div class="row justify-content-center">
                <div class="card w-75">
                        <div class="row no-gutters">
                        <div class="col-md-4">
                            @if($user->avatar)
                                @if ($user->provider_name)
                                    <img src="{{ $user->avatar }}" class="card-img-top" alt="avatar">
                                @else
                                    <img src="/images/{{ $user->avatar }}" class="card-img-top" alt="avatar">
                                @endif
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <a class="card-title" href="user/{{$user->id}}"><h5>{{$user->name}}</h5></a>
                            <p class="card-text">{{$user->description}}</p>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection