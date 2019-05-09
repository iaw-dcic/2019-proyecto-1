@extends('layouts.app')
<title>Acerca de - Carteleras</title>
@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="{{ asset('css/stylecss.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<body class = 'fondo'>
    <div class='tituloAbout'>
        <h1>Información personal</h1>
    </div>
    <ul >
        <li>Alumno: Rodríguez Joaquín</li>
        <li>LU: 108641</li>
        <li>Materia: Ingeniería de Aplicaciones Web</li>
        <li>Año: 2019</li>
    </ul>
    <div class='tituloAbout'>
        <h1>Herramientas utilizadas:</h1>
    </div>
    <ul >
        <li>Laravel (Framework server)</li>
        <li>Bootstrap (Framework estilo)</li>
        <li>Socialite para el login</li>
        <li>Font-awesome para las fuentes</li>
        <li>Extension Lighthouse</li>
    </ul>
    <div class='tituloAbout'>
        <h1>Correcciones del Audit:</h1>
    </div>
    <ul >
        <li>Agregando mod_deflate mejora performance</li>
    </ul>
</body>
@endsection