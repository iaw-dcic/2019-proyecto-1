@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id='banner-content' class="card">
                <div class="card-body">
                    <div id='banner'>
                        <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
                            @if(auth()->user()->avatar && auth()->user()->provider_id)
                                <img id='avatarUser' src="{{ auth()->user()->avatar }}" alt="avatar" name="aboutme" width="140" height="140" class="img-circle">
                            @elseif(auth()->user()->avatar && !(auth()->user()->provider_id))
                                <img id='avatarUser' src="../{{ auth()->user()->avatar }}" alt="avatar" name="aboutme" width="140" height="140" class="img-circle">
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
            <div class="card">
                <div class="card-body">
                    hola mundo
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">About this profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form action="POST">
                <div class="modal-body">
                    <div id='profileInfo'>
                        @if(auth()->user()->avatar && auth()->user()->provider_id)
                            <img id='avatarUser' src="{{ auth()->user()->avatar }}" alt="avatar" name="aboutme" width="140" height="140" class="img-circle">
                        @elseif(auth()->user()->avatar && !(auth()->user()->provider_id))
                            <img id='avatarUser' src="../{{ auth()->user()->avatar }}" alt="avatar" name="aboutme" width="140" height="140" class="img-circle">
                        @endif
                        <input class="form-control backlines" id="name" name='name' value='{{ auth()->user()->name }}' disabled>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="birthdate" class="col-sm-3 col-form-label title">BIRTHDATE:</label>
                        <div class="col-sm-5">
                            @if(auth()->user()->birthdate == null)
                            <input class="form-control backlines" id="birthdate" name='birthdate' value='undefined' disabled>
                            @else
                                <input class="form-control backlines" id="birthdate" name='birthdate' value='{{ auth()->user()->birthdate }}' disabled>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-sm-3 col-form-label title">COUNTRY:</label>
                        <div class="col-sm-5">
                            <select name='country' id="country" class="form-control backlines editSelects" disabled>
                                @foreach($countries as $country)
                                    @if(auth()->user()->country_id == null)
                                        <option>undefined</option>
                                        @break
                                    @endif
                                    <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                    @if($country->country_id == auth()->user()->country_id)
                                    <option value="{{$country->country_id}}" selected>{{$country->country_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="genre" class="col-sm-3 col-form-label title">GENRE:</label>
                        <div class="col-sm-5">
                            <select id="genre" name='genre' class="form-control backlines editSelects" disabled>
                                @foreach($genres as $genre)
                                    @if(auth()->user()->genre_id == null)
                                        <option>undefined</option>
                                        @break
                                    @endif
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                    @if($genre->id == auth()->user()->genre_id)
                                    <option value="{{$genre->id}}" selected>{{$genre->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="genre" class="col-sm-3 col-form-label title">EMOTIONAL SITUATION:</label>
                        <div class="col-sm-5">
                            <select id="situation" name='situation' class="form-control backlines editSelects" disabled>
                                @foreach($situations as $situation)
                                    @if(auth()->user()->situation_id == null)
                                        <option>undefined</option>
                                        @break
                                    @endif
                                    <option value="{{$situation->id}}">{{$situation->name}}</option>
                                    @if($situation->id == auth()->user()->situation_id)
                                    <option value="{{$situation->id}}" selected>{{$situation->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if(auth()->user())
                        <button type="button" class="btn btn-primary">Edit</button>
                    @endif
                    <button type="button" class="btn btn-success">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
