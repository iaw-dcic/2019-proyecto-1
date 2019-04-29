@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Articles</div>
                <div class="card-body">
                    @foreach($articles as $article)
                    <li>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Car Title: <a href="/articles/{{$article->id}}">{{$article->title}}</a></label>
                        </div><div class="form-group row">
                        <label for="fabricationYear" class="col-md-4 col-form-label text-md-right">Car Fabrication Year: {{$article->fabricationYear}}</label>
                        </div><div class="form-group row">
                        <label for="owner" class="col-md-4 col-form-label text-md-right">Car owner: {{$article->user->nick_name}}</label>
                        </div><div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">Car Status: {{$article->estado}}</label>
                        </div>
                    </li>
                    @endforeach
            </div>
        </div>
@endsection            
