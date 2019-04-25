@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id='banner-content' class="card">
                <div class="card-body">
                    <div id='banner'>
                        <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
                            @if(auth()->user()->avatar)
                                <img class='avatarUser' src="../{{ auth()->user()->avatar }}" alt="avatar" name="aboutme" width="140" height="140" class="img-circle">
                            @endif
                        </a>
                        <h2 id='nameUser'>{{ auth()->user()->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="accordion" id="accordionExample">
                <div class="card" data-toggle="collapse" data-target="#collapseOne">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link"><i class="fa fa-plus"></i> TITULO</button>									
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="content-more">
        <button id="btn-more" class="btn">
            <span>+</span>
        </button>
    </div>
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">About this profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form enctype="multipart/form-data" id="editForm" method="POST" action="{{ url('updateuser') }}">
                @csrf
                <div class="modal-body">
                    <div id='profileInfo'>
                        @if(auth()->user()->avatar)
                            <a id="refImage">
                                <img id='avatarEdit' class='avatarEdit' src="../{{ auth()->user()->avatar }}" alt="avatar" name="aboutme" width="140" height="140" class="img-circle">
                                <input id='fileAvatar' name='avatar' type="file" accept="image/*">
                            </a>
                        @endif
                        <input class="my-form-control backlines" id="name" name='name' value='{{ auth()->user()->name }}' disabled>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="birthdate" class="col-sm-3 col-form-label title">BIRTHDATE:</label>
                        <div class="col">
                            @if(auth()->user()->birthdate == null)
                                <input class="my-form-control backlines" id="birthdate" name='birthdate' value='undefined' disabled>
                            @else
                                <input class="my-form-control backlines" id="birthdate" name='birthdate' value='{{ auth()->user()->birthdate }}' disabled>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-sm-3 col-form-label title">COUNTRY:</label>
                        <div class="col">
                            <select name='country_id' id="country" class="my-form-control backlines editSelects" disabled>
                                @if(auth()->user()->country_id == null)
                                    <option>undefined</option>
                                @endif
                                @foreach($countries as $country)
                                    @if($country->country_id == auth()->user()->country_id)
                                        <option value="{{$country->country_id}}" selected>{{$country->country_name}}</option>
                                        @continue
                                    @endif
                                    <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="genre" class="col-sm-3 col-form-label title">GENRE:</label>
                        <div class="col">
                            <select id="genre" name='genre_id' class="my-form-control backlines editSelects" disabled>
                                @if(auth()->user()->genre_id == null)
                                    <option>undefined</option>
                                @endif
                                @foreach($genres as $genre)
                                    @if($genre->id == auth()->user()->genre_id)
                                        <option value="{{$genre->id}}" selected>{{$genre->name}}</option>
                                        @continue
                                    @endif
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="situation" class="col-sm-3 col-form-label title">EMOTIONAL SITUATION:</label>
                        <div class="col">
                            <select id="situation" name='situation_id' class="my-form-control backlines editSelects" disabled>
                                @if(auth()->user()->situation_id == null)
                                    <option>undefined</option>
                                @endif
                                @foreach($situations as $situation)
                                    @if($situation->id == auth()->user()->situation_id)
                                        <option value="{{$situation->id}}" selected>{{$situation->name}}</option>
                                        @continue
                                    @endif
                                    <option value="{{$situation->id}}">{{$situation->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if(auth()->user())
                        <button type="button" id="editButton" class="btn btn-primary" value="edit">Edit</button>
                    @endif
                    <button type="button" id='closeButton' class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class='col'>
                    <img src="" id="imagepreview" width="100%" height="100%">
                </div>      
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
