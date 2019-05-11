@extends('partials.auth.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="jumbotron">

                    <h1>Opps parece que ha ocurrido un error ! </h1>
                    <hr class="half-rule"/>
                    <h1> {{ $message }} </h1>

                </div>

            </div>
        </div>
    </div>
@endsection
