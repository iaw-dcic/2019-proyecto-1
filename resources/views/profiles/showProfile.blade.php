@extends('layouts.app')

@section('myLayoutTitle', 'Profile')

@section('cssFileListing')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile Info</div>
                    <div class="card-body">
                        <p><b>Username:</b> {{ $user->name }}</p>
                        @if(((Auth::user()->name) == ($user->name)) || (($user->email_public) == 1))
                            <p><b>Email:</b> {{ $user->email }}</p>
                        @endif
                        @if(((Auth::user()->name) == ($user->name)) || (($user->first_name_public) == 1))
                            <p><b>First Name:</b> {{ $user->first_name }}</p>
                        @endif
                        @if(((Auth::user()->name) == ($user->name)) || (($user->last_name_public) == 1))
                            <p><b>Last Name:</b> {{ $user->last_name }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if((Auth::user()->name) == ($user->name))
        </div>
            <button type="button" id="editButton" onclick="location.href='/profiles/{{ Auth::user()->name }}/edit'">Edit</button>
        </div>
    @endif
    </div>
        <button type="button" id="goBackButton" onclick="location.href='{{ url()->previous() }}'">Return</button>
    </div>

@endsection