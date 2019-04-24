@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Articles</h1>
    @foreach($articles as $article)
        <li>
            Car: <a href="/articles/{{$article->id}}">{{$article->title}}</a>
                 / Fabrication Year: {{$article->fabricationYear}} /
                  Price: ${{$article->price}} / Owner: "{{$article->user->nick_name}}"
        </li>

    @endforeach
</div>
@endsection                    