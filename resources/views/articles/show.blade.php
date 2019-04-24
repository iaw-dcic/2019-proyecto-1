@extends('layouts.app')

@section('content')             

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$article->title}}</div>

                <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">
                            Fabrication Year: {{ $article->fabricationYear }}</label>

                        </div>

                        <div class="form-group row">
                            <label for="fabricationYear" class="col-md-4 col-form-label text-md-right">
                            Price: ${{$article->price }}</label>                            
                        </div>

                        <div class="form-group row">
                            <label for="edit" class="col-md-4 col-form-label text-md-right">
                            Do you want to edit the car? Click <a href="/articles/{{$article->id}}/edit">here</a></label>                            
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection('content')