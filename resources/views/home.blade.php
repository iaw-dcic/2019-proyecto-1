@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card material-light">
                <div class="card-header material-dark">Dashboard</div>

                <div class="card-body material-regular">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                          <h3>Profile</h3>
                          <div class="">
                            Name: {{ Auth::user()->name }}
                          </div>
                          <div class="">
                              Edad: {{$perfil->edad}}
                          </div>
                          <div class="">
                              Ciudad: {{$perfil->ciudad}}
                          </div>
                          <div class="">
                            <a href="{{ url('/edit_profile') }}" class="btn btn-secondary material-dark"><i class="fas fa-user-edit"></i> Edit Info</a>
                          </div>
                          <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
