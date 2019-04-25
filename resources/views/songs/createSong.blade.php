@extends('layout')

@section('myLayoutTitle', 'Add New Song')

@section('content')

    <h1 class="title">Create New List</h1>

    <form method="POST" action="/songs">

        {{ csrf_field() }}

        <div class="field">
            <label class="label" for="list_name">List Title</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('list_name') ? 'is-danger' : '' }}" name="list_name" required value="{{ old('list_name') }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create List</button>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="button" onclick="location.href='{{ url('home') }}'">Go Back</button>
            </div>
        </div>

        @if ($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
    </form>

@endsection