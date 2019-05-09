@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{$data['operation']}}
                    </div>
                    <div class="card-body">
                    <h5 class="card-title">{{$data['description']}}</h5>
                        <a href=".." class="btn btn-primary">Go home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection