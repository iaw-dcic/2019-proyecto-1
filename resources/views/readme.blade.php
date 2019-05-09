@extends('layouts.app')

@section('content')
<hr>
<h1>Readme proyecto-1</h1>
<hr>
Autor: Luciano Baschiera, LU 111847.
<hr>
<h3>Audits de Chrome:</h3>
<ul>
<li><h5>Homescreen logueado:</h5></li>
    <ul>
        <li>Performance = 83</li>
        <li>Accesibilidad = 84</li>
    </ul>
<li><h5>User page:</h5></li>
    <ul>    
        <li>Performance = 80</li>
        <li>Accesibilidad = 94</li>
    </ul>
<li><h5>Al realizar una búsqueda de usuario:</h5></li>
    <ul>    
        <li>Performance = 84</li>
        <li>Accesibilidad = 94</li>
    </ul>
</ul>
<h3>Librerías externas:</h3>
<hr>
    Laravel Socialite (composer require laravel/socialite)
<hr>
    Awesome search box (<a href="https://bootsnipp.com/snippets/GaeQR">https://bootsnipp.com/snippets/GaeQR</a>) (Parte del css y html)
<hr>
<h3>Notas:</h3>
<ul>
    <li>Para acceder a las colecciones publicas de los demás usuarios, el visitante debe encontrarlo por la barra de búsqueda o conocer la url del perfil de éste</li>
    <li>No es posible modificar la imagen del usuario si se registró con Google.</li>
    <li>No es posible recuperar la contraseña si el usuario la olvidó (no pude setear un servidor de mail que me funcione)</li>
</ul>
@endsection