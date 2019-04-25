<!DOCTYPE html>
<html lang="en">
    <!-- uso yield para inyectar contenido en welcome.blade.php; main es mi plantilla -->
<head>
    <meta charset="UTF-8">
    <title> @yield('title','Default') </title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
</head>
<body>

    @include('template.navBar.nav')

    <div class="container">
           
            @include('flash::message')


        @yield('content')  
    </div>

    <section>
       @include('template.footer.footer')
    </section>

   
    <script src= "{{ asset('plugins/bootstrap/js/bootstrap.js') }}"> </script>
    
    <script src= "{{ asset('js/app.js') }}"> </script>

</body>
</html>