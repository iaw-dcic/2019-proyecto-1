@extends('layouts.app')

<!DOCTYPE html>

<html>

    <head>

        <title>@yield('myLayoutTitle', 'Laravel')</title>

    </head>

    <body>

        <div class="myContainer">

            @yield('myLayoutContent')
            
        </div>

    </body>

</html>