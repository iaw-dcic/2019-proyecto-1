<!DOCTYPE html>

<html>

    <head>

        <title>@yield('title', 'Laravel')</title> <!--(nombre de la pagina, nombre por defecto si no se pone nada)-->

    </head>

    <body>

        @yield('content') <!--La seccion definica como content va a ubicarse aca-->

        <ul>
            
            <a href="/">Volver</a>
            <a href="/test">TEST</a>
            <a href="/about">About</a>

        </ul>

    </body>

</html>