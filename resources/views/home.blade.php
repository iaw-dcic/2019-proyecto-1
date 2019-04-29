@extends('layouts.app')
@section('js_extra')
<script src="{{asset('js/home.js')}}"></script>
@endsection
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
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                      <div class="col-sm-2">
                        <h3>My Lists</h3>
                      </div>
                      <div class="col-sm-2">
                        <a href="#" title='Add new list'class="btn btn-secondary material-dark"><i class="far fa-plus-square"></i></a>
                      </div>
                    </div>

                    <div class="row justify-content-between">
                        @foreach ($listas as $lista)

                          <div class="col-sm-6">
                                <div class="card material-primary">
                                  <div class="card-header material-dark">
                                    {{$lista->titulo}}
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col">
                                        <div class="">
                                          <label for="">Tags:</label>
                                          <span>{{$lista->tags}}</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                        <a title="Edit list" class="btn btn-secondary material-dark" href="#"><i class="far fa-edit"></i></a>
                                        <a title="Remove list" class="btn btn-secondary material-dark" href="#"><i class="far fa-trash-alt"></i></a>
                                      </div>

                                    </div>

                                  </div>

                                </div>
                          </div>

                        @endforeach
                      </div>


                    <br>
                    <div class="row">
                      <div class="col">
                        {{$listas->links()}}
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
