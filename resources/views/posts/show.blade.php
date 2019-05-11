@extends('layouts.app')

@section('content')
    <div class="container">
        @if($post != NULL)
                <h4>{{$post->title}}</h4>
        @endif    
    </div>
@endsection