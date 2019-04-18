@extends('layout')

@section('content')
<div class="links">
    <a href="/ingresar">Ingresar</a>

</div>
@endsection


@section('content2')
<h2>Pagina Principal</h2>

@foreach ($books as $book)
<h1>{{$book->title}}</h1>
@endforeach
@endsection