@extends('layouts.app')

@section('content')
<div class="container">
    
    <hr>
    Change your profile
    <hr>
    <form method= "POST" action= "{{route('edit',Auth::user()->id)}}">
    @csrf
    <div class="form-row">
        <div class="col-4">
            <input name="name" id="name" type="text" class="form-control" placeholder="Name">
        </div>
        <div class="col">
            <input name="nick" id="nick" type="text" class="form-control" placeholder="Nick">
        </div>
        <div class="col">
            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
        </div>
        <div>
            <button type="submit" class="btn btn-outline-dark">Save</button>
        </div>
    </div>
    
    </form>

</div>
@endsection