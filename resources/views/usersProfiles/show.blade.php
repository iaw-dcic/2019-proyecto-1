@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">{{$user->name}}</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6><b>About</b></h6>
                            <p>
                                @if(($user->description)!= null)
                                {{$user->description}}
                                @else
                                No Information avaiable
                                @endif
                            </p>

                            
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody> 
                                    @foreach($posts as $post)
                                                                               
                                        <tr>
                                        <td>
                                            <h3> <a href ="/posts/{{$post->id}}"> {{$post->title}}</a> </h3> 
                                            <small> Written on {{$post ->created_at}} by {{$post->user['name']}} </small>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
    </div>
</div>
@endsection