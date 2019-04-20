<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="pagina web para iaw uns">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">    
    @yield('script')
    <!-- Bootstrap core CSS -->
 
    <title>Recetario</title>
  </head>
   @include('navbar')
 

<main role="main">
  
  @yield('content')
  
</main>  
  @include('footer')

 
    <script defer  src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   

    <!-- scripts para el carousel  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"   crossorigin="anonymous">
    <script defer src="https://code.jquery.com/jquery-3.2.1.min.js"  crossorigin="anonymous"></script>
    <script defer  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"  crossorigin="anonymous"></script>
     
    <script defer  src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"   crossorigin="anonymous"></script>
  </html>
