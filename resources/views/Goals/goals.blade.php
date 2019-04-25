@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Best Goals!</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Estás logueado!

                    <div style="padding:20px;margin-top:30px;height:1500px;">
                        <h1>Goals</h1>

                        @foreach ($goals as $goal)
                        <p>This is goal {{ $goal->autor }} - {{ $goal->equipo }} - {{ $goal->equipo_rival }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection