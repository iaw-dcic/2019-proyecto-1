<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ListApp</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
            @include('navbar')   
        <main class="py-4">
            <div class = 'container'>
            @yield('content')
            </div>
        </main>
    </div>
     @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        {{$error}}
    </div>
    @endforeach
@endif

 @if(session('success'))
    <div class="alert alert-succes">
        {{session('success')}}
    </div>
@endif

 @if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
</body>
</html>
