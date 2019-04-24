<!DOCTYPE html>
<html lang="en">
    <!-- uso yield para inyectar contenido en welcome.blade.php; main es mi plantilla -->
<head>
    <meta charset="UTF-8">
    <title> @yield('title','Default') | algo </title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
</head>
<body>

    @include('admin.template.navBar.nav')

    <section>
       
        @yield('content')
    </section>     


    <section>
       @include('admin.template.footer.footer')
    </section>


    <script src= "{{ asset('plugins/bootstrap/js/bootstrap.js') }}"> </script>
    
    <script src= "{{ asset('js/app.js') }}"> </script>

</body>
</html>