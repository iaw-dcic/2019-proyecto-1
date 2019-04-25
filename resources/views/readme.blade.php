@extends('layouts.app')

@section('extraStyles')
<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
<link href= "{{asset('css/readmeStyle.css')}}" rel="stylesheet">
@endsection

@section('content')
    <h1 class="titulo">Readme</h1>
    
<div class="general">
    <div class="all-Info">
        <div class="d-flex flex-column justify-content-center Autoria">
            <div class="p-2">Autor: Pablo Guillermo Ceballos Vitale</div>
            <div class="p-2">Universidad Nacional del Sur</div>
            <div class="p-2">Año 2019 <div>
        
        </div>
    </div>

    <div class="d-flex flex-column">
        <h3> Comentarios y/o aclaraciones </h3>
         
    </div>
</div>
@endsection