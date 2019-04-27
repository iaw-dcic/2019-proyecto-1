<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Styre</title>    
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="{{asset('css/welcome.css')}}" rel="stylesheet">
    </head>
    <body>
      <section class="welcome_section">
          <p class="welcome_section_subtitle">Administra tus listas de películas de forma simple y elegante!</p>
            <h1 class="welcome_title">
            <p>Styre</p>
                 Styre
             </h1>
             <a href="home" class="btn">Comenzar</a>
        </section>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('js/welcome.js')}}"></script>
    </body>
</html>
