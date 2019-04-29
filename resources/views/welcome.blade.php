@extends('layouts.app')

<link type="text/css" href="{{ asset('css/login-register.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(count($lists) >= 1)
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">
                    @foreach($lists as $list)
                    <div class="card">
                        <div data-toggle="collapse" data-target="#list{{ $list->id }}-card" class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button type="button" class="btn btn-link"><img class='avatarUser' src="../{{ $list->user_avatar }}" alt="avatar" width="18" height="18"> {{ $list->user_name }} has posted: <strong> {{ $list->name }} </strong></button>									
                            </h2>
                        </div>
                        <div id="list{{ $list->id }}-card" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-list table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Author</th>
                                                <th>Editorial</th>
                                                <th>Publication Date</th>
                                                <th>Country</th>
                                                <th>Synopsis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list->items as $item)
                                            <tr value='{{ $item->id }}' id='{{ $item->id }}'>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->author }}</td>
                                                <td>{{ $item->editorial }}</td>
                                                <td>{{ $item->publication_date }}</td>
                                                <td>{{ $item->country_id }}</td>
                                                <td>{{ $item->synopsis }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-md-10">
                <div class="card mb-4 text-white bg-dark">
                    <img class="card-img-top" src="images/dashboard.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Welcome</h5>
                        <p class="card-text">To start, go to your profile and create a list</p>
                        @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Sign in</a>
                        @else
                        <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">Go to my profile</a>
                        @endguest
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

@endsection