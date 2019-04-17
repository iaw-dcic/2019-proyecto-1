@extends('layouts.app')

@section('content')

<div class="container">
    <p>Albums</p>
    <a href="{{ route('createAlbum') }}" class="btn btn-outline-success" role="button" aria-pressed="true">Agregar Album</a>
    

</div>


@endsection
