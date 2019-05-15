<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jdownloader2 cnl2</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
    <!-- Icons -->
    {{-- <link rel="stylesheet" href="{{ asset('css/fontawesome-5.8.1/css/all.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" --}}
    {{-- integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> --}}

    {{-- <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}"> --}}

</head>

<body>
    <div class="container py-4">
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h4 class="mb-0">{{ __('JDownloader 2 links') }}</h4>
            </div>

            <div class="card-body">
                <p class="mb-0">Esta herramienta sirve para obtener los links de descarga de los botones que suelen decir: Click para añadir a JDownloader.</p>
                <p>Para esto: clic derecho en dicho boton -> inspeccionar -> copiar el valor del tag "input" con name="crypted" -> pegar debajo</p>
                <form method="POST" action="/jd2decrypt">
                    @csrf

                    <div class="form-group row">
                        <label for="crypted"
                            class="col-md-12 col-form-label text-md-left form-control-label">{{ __('Crypted value') }}</label>
                        <div class="col-md-12">
                            <input id="crypted" type="text" class="form-control" name="crypted" value="" required autofocus>
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <input type="reset" class="btn btn-secondary" value="Borrar">
                            {{-- <a href="#" class="btn btn-secondary">Borrar</a> --}}
                            <button type="submit" class="btn btn-primary">
                                {{ __('Obtener links') }}
                            </button>
                        </div>
                    </div>
                </form>
                
                @if(session('links'))
                <p style="white-space: pre-line">{{ session('links') }} </p>
                {{$links = null}}
                @endif
            </div>
        </div>



    </div>
</body>

</html>