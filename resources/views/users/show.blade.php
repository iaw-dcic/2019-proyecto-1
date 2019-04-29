@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @guest
                        <h2>{{$user->nick_name}}'s Profile</h2>
                    @else 
                        @if(Auth::user()->id==$user->id )
                            <h2>My Profile<a class="btn btn-small btn-primary" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit Profile</a></h2>
                        @else
                        <h2>{{$user->nick_name}}'s Profile</h2>
                        @endif
                    @endguest
                </div>
            <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Nick Name</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Age</td>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $user->nick_name }}</td>
                            <td>@if($user->first_name!=''){{$user->first_name}}@endif</td>
                            <td>@if($user->last_name!=''){{$user->last_name}}@endif</td>
                            <td>{{$user->email}}</td>
                            <td>@if($user->age!=''){{$user->age}}@endif</td>
                         </tr>
                
                </tbody>
            </table>
            </div>
         </div>   
@endsection