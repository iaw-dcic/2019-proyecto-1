@extends('layouts.app')

@section('opcionesNavBar')
<li class="nav-item">
    <a class="nav-link" href='/partidosPublicos'>Partidos públicos</a>
</li>
@endsection

@section('content')
<div class="content">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Bienvenido</h1>
            <p class="lead">Al sitio web para crear y organizar tu partido.</p>
        </div>
    </div>
</div>
@endsection