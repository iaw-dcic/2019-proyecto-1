<!DOCTYPE html>
<html lang="en">
    <!-- uso yield para inyectar contenido en welcome.blade.php; main es mi plantilla -->
<head>
    <meta charset="UTF-8">
    <title> @yield('title','MyMusic: Login') </title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
</head>
<body>

        @include('layouts.app')

    <div class="container">
           
        @include('flash::message')


        @yield('content')  
    </div>

    <section>
       @include('template.footer.footer')
    </section>

    <script src= "{{ asset('plugins/bootstrap/js/bootstrap.js') }}"> </script>

    
</body>
</html>