@extends('layouts.master')

@section('content')
<div class="jumbotron">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hola Mundo!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Estas loggeado!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
