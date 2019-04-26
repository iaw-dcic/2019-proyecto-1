@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('llena los datos de tu juego aquí!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('/profile')}}">
                        @csrf
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
endsection