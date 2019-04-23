@extends('layouts.app')

@section('content')

<h1>Edit element</h1>

<form method="POST" action="/listelements/{{ $listelement->id }}">
    @method('PATCH')
    @csrf
    <div>
        <label for="title">Title</label>

        <div>
            <input type="text" name="name" placeholder="Name">
        </div>
    </div>

    <div>
        <label for="description">Description</label>

        <div>
            <textarea name="description"></textarea>
        </div>
    </div>

    <div>
        <button type="submit">Update</button>
    </div>
</form>

@endsection