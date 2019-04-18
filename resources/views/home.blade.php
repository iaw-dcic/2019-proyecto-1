@extends('layout')

@section('body')
    <nav class="navbar navbar-default fadeInDown">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">List Maker</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Top voted</a>
                </li>
                <li>
                    <a href="#">Most viewed</a>
                </li>
                <li>
                    <a href="#">New lists</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>
@endsection
