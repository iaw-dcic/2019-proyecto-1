@extends('layouts.app')

@section('myLayoutTitle', 'Public Lists')

@section('cssFileListing')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="title">All Public Lists</h1>

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

        <p id="emptyMessage">There are no lists created or made public.</p>

    @endif

    <div class="field">
        <div class="control">
            <button type="button" onclick="location.href='{{ url()->previous() }}'">Go Back</button>
        </div>
    </div>

@endsection