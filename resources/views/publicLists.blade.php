@extends('layouts.app')

@section('extraScripts')
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed hola-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
            crossorigin="anonymous"></script>
@endsection

@section('extraStyles')
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link href="{{asset('css/publicListsStyle.css')}}" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
         crossorigin="anonymous">
@endsection

@section('content')
    <div class="d-flex flex-column">
    @if(!$listas->isEmpty())
        @foreach($lista as $listas)
            <li> <span class="d-block p-2 bg-dark text-white">{{$lista->titulo}}</span>  </li>
        @endforeach
    @else  
        <h1 class="NoLists"> No hay Listas públicas para ver, vuelve más tarde! </h1>
    @endif
    </div>
@endsection