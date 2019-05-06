@extends('layouts.app')
<title>Mi cuenta</title>
@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="{{ asset('css/stylecss.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<body class = 'fondo'>
    <div class="links">
        <a href="{{ url('/perfil') }}">Mi perfil</a>
        <br>
        <a href="{{ url('/PelitecaEditor') }}">Mi peliteca</a>
    </div>
</body>
@endsection
