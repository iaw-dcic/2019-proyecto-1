@extends('secondTemplate')

@section('content')
<div class="container">
    <h1 class="display-2 text-muted text-center mt-5 pt-5">Hello, {{Auth::user()->name}}</h1>
    <p class="h4 text-muted text-center mt-5 pt-5">You currently have {{$number}} {{ $number == 1 ? "list" : "lists" }}</p>
</div>
@endsection
