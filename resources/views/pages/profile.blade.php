@extends('layouts.app') 
@section('content')

<div class="row wrap justify-content-center">
    
    <div class="col-sm-2 pr-0 plcol">
        <div class="circular">
            @if($user->image)
                <img id="profileImage"  src="{{ $user->image }}">
            @else 
                <img id="profileImage" src="{{ asset('/img/profile-pictures/profile-placeholder.png') }}">
            @endif
        </div>
    </div>

    <div class="col-sm-4">
        <header class="masthead pt-0">
            <div class="container">
                <div class="row h-100 align-items-center pb-5">
                    <div class="col-xs-6 align-self-baseline">
                        <h3 class="text-white font-weight-bold">{{ $user->username }}</h3>
                    </div>
                    @if (Auth::check() && Auth::user()->id == $user->id)
                    <div class="col-xs-6 align-self-baseline pl-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
                            Edit profile
                        </button>
                    </div>
                    @endif
                    @if ($user->country !== null)
                    <div class="col-lg-10 align-self-baseline mb-2">
                        <small><cite title="San Francisco, USA" class="text-white-75 font-weight-light mb-5">From {{ $user->country }}</cite></small>
                    </div>
                    @endif
                    <div class="col-lg-5 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5 wrappedDescription">{{ $user->biography }}</p>
                    </div>
                </div>
            </div>
        </header>
    </div>
</div>

<div class="container">
    <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10">
            
            <h2 class="text-uppercase text-white font-weight-bold">{{Auth::check() && Auth::user()->id == $user->id ? 'Your lists':' Public lists' }}</h2>
            <hr class="divider my-4">
        </div>
    </div>
</div>
@if ($userlistsToShow->count())
<div class="row wrap justify-content-center">
    @foreach ($userlistsToShow as $userlist)
        <div class="col-sm-2">
            <div class="card mb-4">
                @if($userlist->image)
                    <img class="card-img-top"  src="{{ $userlist->image }}">
                @else 
                    <img class="card-img-top" src="http://placehold.it/300x200">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $userlist->title }}</h5>
                    <p class="card-text p">{{ $userlist->description }}</p>
                    <a class="btn btn-primary" href="/userlists/{{ $userlist->id }}">View list</a>
                    @auth
                    @if (Auth::user()->id == $user->id)
                    <p class="font-weight-light mb-0 pt-2">Public</p>
                    <div class="pb-2">
                        <form method="POST" action="/userlists/{{ $userlist->id }}">
                        @method('PATCH')
                        @csrf
                        <label class="switch">
                            <input type="hidden" name="public" value="{{ $userlist->public ? '0':'1' }}"/>>
                            <input type="checkbox" onChange="this.form.submit()" {{ $userlist->public ? 'checked': ''}}>
                        <span class="slider round"></span>
                        </label>
                        </form>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
        @if($loop->iteration % 4 == 0)
        </div><div class="row wrap justify-content-center ">
        @endif
    @endforeach
</div> 
@else 
<header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
              <div class="col-lg-8 align-self-baseline">
                @if(Auth::check() && Auth::user()->id == $user->id)
                    <p class="text-white-75 font-weight-light mb-5">You currently don't have any lists, <a href="#" data-toggle="modal" data-target="#newListModal">create one</a>!</p>
                @else 
                    <p class="text-white-75 font-weight-light mb-5">This user currently doesn't have any public lists.</p>
                @endif
              </div>
            </div>
        </div>
</header>
@endif

@auth
@if (Auth::user()->id == $user->id)
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="bioModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bioModalLongTitle">Edit profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/profile/{{ $user->id }}" role="form" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                            <h5>Profile picture</h5>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="profile_picture">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        <hr>
                        <h5>Country</h5>
                        <select id="countrySelect" name ="country">
                            <option value=""></option>
                                @foreach(Countries::getList('en', 'php') as $country) 
                                    <option value="{{ $country }}" {{ $user->country === $country ? 'selected':'' }}>{{ $country }}</option>
                                @endforeach
                        </select>
                        <hr>
                        <h5>Bio</h5>
                        <div class="form-group">
                            <textarea class="form-control" name="biography" rows="3" maxlength="140"> {{ $user->biography }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endif
@endauth
@endsection