@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        <form enctype="multipart/form-data" action="/profile" method="POST">
            <img src="/uploads/avatars/{{$user->avatar}}" id="img-cir">
            <h2>{{$user->name}}</h2>
            <label>Update Profile Image</label>
            <br>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="float-right btn btn-sm btn-primary">
        </form>
        </div>
    </div>
</div>    
@endsection