@extends('layouts.app')

@section('myLayoutTitle', 'Perfil')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile Info</div>
                    <div class="card-body">
                        <p><b>Author:</b> {{ Auth::user()->name }}</p>
                        <p><b>Email:</b> {{ Auth::user()->email }}</p>
                        <p><b>First Name:</b> {{ Auth::user()->first_name }}</p>
                        <p><b>Last Name:</b> {{ Auth::user()->last_name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection