@extends('layouts.app')

@section('content')

<h1>Technologies applied to this web application</h1>    

<div class='jumbotron'>
            <ul>
                <li>Laravel</li>
                <li>Bootstrap</li>
                <li>Socialite</li>
            </ul>

        <p> Autor: Agustin Straguadagno </p>
        <p> Queda pendiente implementar el front end de la seccion de creacion de posts, ya que por el momento no se generan listas
            sino que solamente se pueden crear posts los cuales contienen titulo y cuerpo.
        </p>
        <p>Estos son los valores arrojados por Lighthouse</p>
        <img src='C:\xampp\proyecto-1\resources\performance.png' >

</div>

@endsection

