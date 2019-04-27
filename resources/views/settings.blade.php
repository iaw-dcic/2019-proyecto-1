@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Configuracion</h3>
            <p>{{auth()->user()->name}}</p>
        </div>
    </div>
</div>
@endsection
