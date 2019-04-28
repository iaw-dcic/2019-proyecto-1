@extends('layouts.appContent')

@section('content')
<div class="page-header">
  <h1>{{$datosJuego[0]->name}} <small>datos</small></h1>
</div>
<div class="panel panel-primary">
    <p class="text-center">  {{$datosJuego[0]->genre}} </p>
    <p class="text-center">  {{$datosJuego[0]->company}} </p>
    <p class="text-center">  {{$datosJuego[0]->release_date}} </p>
</div>

<div>
    
</div>
@endsection