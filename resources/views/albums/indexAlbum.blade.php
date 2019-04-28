@extends('layouts.app')

@section('myLayoutTitle', 'Lists')

@section('cssFileListing')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="title">Created Lists</h1>

    @if($album->count())

        <ul>

            @foreach ($album as $elem)

                <li>

                    <a href="/albums/{{ $elem->list_id }}">

                        {{ $elem->list_name }}

                    </a>

                </li>

            @endforeach

        </ul>

    @else

        <p id="emptyMessage">There are no lists created by this user.</p>

    @endif

    <div class="field">
        <div class="control">
            <button type="button" onclick="location.href='{{ url('home') }}'">Go Back</button>
        </div>
    </div>

@endsection