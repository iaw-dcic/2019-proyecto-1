@extends('layouts.app')
<title>Mi cuenta</title>
@section('content')
<link href="{{ asset('css/stylecss.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<body class = 'fondo'>
    <div class="links">
        <a href="{{ route('users.edit',Auth::user()->id) }}">{{ __('Mi Perfil') }}</a>
        <br><br>
        <a href="{{ url('/PelitecaEditor') }}">Mi peliteca</a>
    </div>
</body>
@endsection
