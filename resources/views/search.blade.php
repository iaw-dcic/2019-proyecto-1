@extends('layouts.app')

@section('sectioncontent')
<section id="hero">
    <div class="hero-container">
        <div class="col-md-10 col-lg-8">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h1>Resultados de Búsqueda</h1>
                </div>
                <div class="panel-body sectionSize scrollbar-primary panelBodySearchSize">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-center align-items-center">
                            <h3>Usuarios</h3>
                        </li>
                        @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <img class="rounded-circle mr-1" width="50px" height="50px" src="{{ (substr_compare($user->avatar, 'https://', 0, 8)==0) ? $user->avatar : asset('uploads/avatars/'.$user->avatar) }}">
                                <a href="/profile/{{$user->username}}">{{$user->username}}</a>
                            </div>
                        </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-center align-items-center">
                            <h3>Listas</h3>
                        </li>
                        @foreach($listas as $lista)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="/lists/{{$lista->id}}">{{$lista->listname}}</a>
                            <div>
                                <span class="badge badge-success badge-pill">{{$lista->likes}} Likes</span>
                                <span class="badge badge-success badge-pill">{{$lista->views}} Vistas</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection