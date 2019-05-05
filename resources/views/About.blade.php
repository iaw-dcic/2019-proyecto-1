@extends('layouts.app')
<title>Acerca de - Carteleras</title>
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
@section('content')
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
    </ul>
</body>
@endsection