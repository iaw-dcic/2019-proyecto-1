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

    
        <script>
        window.fbAsyncInit = function() {
            FB.init({
            appId      : '{your-app-id}',
            cookie     : true,
            xfbml      : true,
            version    : '{api-version}'
            });
            
            FB.AppEvents.logPageView();   
            
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Styles -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
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
</body>
</html>
