@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card rounded-big">
                <h4 class="card-header bg-dark">
                    Hola, {{auth()->user()->name}}!
                </h4>
                <div class="card-body">
                    <a class="card-link" href="{{ url(auth()->user()->id,'playlists')}}">Ver mis playlists</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
