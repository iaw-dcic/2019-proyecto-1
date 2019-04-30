@extends('layouts.app')

@section('content')
<div id="content-principal" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id='banner-content' class="card">
                <div class="card-body">
                    <div id='banner'>
                        @if(auth()->user() && Route::current()->getName() == "home")
                        <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
                            @if(auth()->user()->avatar)
                                <img class='avatarUser' src="../{{ auth()->user()->avatar }}" alt="avatar" name="aboutme" width="140" height="140" class="img-circle">
                            @endif
                        </a>
                        <h2 id='nameUser'>{{ auth()->user()->name }}</h2>
                        @else
                        <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
                            <img class='avatarUser' src="../../{{ $user->avatar }}" alt="avatar" name="aboutme" width="140" height="140" class="img-circle">
                        </a>
                        <h2 id='nameUser'>{{ $user->name }}</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(count($lists) >= 1)
            <div class="accordion" id="accordionExample">
                @foreach($lists as $list)
                <div class="card">
                    <div data-toggle="collapse" data-target="#list{{ $list->id }}-card" class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link"><i class="fa fa-plus"></i> {{ $list->name }}</button>									
                        </h2>
                    </div>
                    <div id="list{{ $list->id }}-card" class="collapse" data-parent="#accordionExample">
                        @if(auth()->user() && Route::current()->getName() == "home")
                        <div class="modal-header">
                            <button onClick="addItem({{ $list->id }});" data-toggle="modal" data-target="#itemModal" type="button" class="btn btn-success">NEW ITEM</button>

                            <button type="button" onClick="editList({{ $list->id }}, '{{ $list->name }}', '{{ $list->description }}', '{{ $list->estate }}')" data-toggle="modal" data-target="#listEdit" class="btn btn-warning">EDIT LIST</button>

                            <form method="POST" action="{{ url('deletelist') }}/{{ $list->id }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">DELETE LIST</button>
                            </form>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="list{{ $list->id }}" class="table table-list table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Author</th>
                                            <th>Editorial</th>
                                            <th>Publication Date</th>
                                            <th>Country</th>
                                            <th>Synopsis</th>
                                            @if(auth()->user() && Route::current()->getName() == "home")
                                            <th class="content-options"></th>
                                            <th class="content-options"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list->items as $item)
                                            <tr value='{{ $item->id }}' id='{{ $item->id }}'>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->author }}</td>
                                                <td>{{ $item->editorial }}</td>
                                                <td>{{ $item->publication_date }}</td>
                                                <td>{{ $item->country_id }}</td>
                                                <td>{{ $item->synopsis }}</td>
                                                @if(auth()->user() && Route::current()->getName() == "home")
                                                <td><button onClick="editItem({{ $item->id }});" data-toggle="modal" data-target="#itemEdit" class="editRow content-options btn btn-primary">EDIT</button></td>
                                                <td><button class="deleteRow content-options btn btn-danger">DELETE</button></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="card">
                <div class="card-body title">
                    Create a new list to start
                </div>
            </div>
            @endif
        </div>
    </div>
            
    @if(Route::current()->getName() == "home")
    <div id="content-more">
        <button data-toggle="modal" data-target="#listModal" id="btn-more" class="btn">
            <span>+</span>
        </button>
    </div>
    @endif
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
                    @if(Route::current()->getName() == "home")
                        @if(auth()->user()->avatar)
                            <a id="refImage">
                                <img id='avatarEdit' class='avatarEdit' src="../{{ auth()->user()->avatar }}" alt="avatar" name="aboutme" width="140" height="140" class="img-circle">
                                <input id='fileAvatar' name='avatar' type="file" accept="image/*">
                            </a>
                        @endif
                        <input class="my-form-control backlines" id="name" name='name' value='{{ auth()->user()->name }}' disabled>
                    @elseif(Route::current()->getName() == "profile")
                        <a id="refImage">
                            <img id='avatarEdit' class='avatarEdit' src="../../{{ $user->avatar }}" alt="avatar" name="aboutme" width="140" height="140" class="img-circle">
                        </a>
                        <input class="my-form-control backlines" id="name" name='name' value='{{$user->name }}' disabled>
                    @endif

                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="birthdate" class="col-sm-3 col-form-label title">BIRTHDATE:</label>
                        <div class="col">
                        @if(Route::current()->getName() == "home")
                            @if(auth()->user()->birthdate == null)
                                <input class="my-form-control backlines" id="birthdate" name='birthdate' value='undefined' disabled>
                            @else
                                <input class="my-form-control backlines" id="birthdate" name='birthdate' value='{{ auth()->user()->birthdate }}' disabled>
                            @endif
                        @elseif(Route::current()->getName() == "profile")
                            @if($user->birthdate == null)
                                <input class="my-form-control backlines" id="birthdate" name='birthdate' value='undefined' disabled>
                            @else
                                <input class="my-form-control backlines" id="birthdate" name='birthdate' value='{{ $user->birthdate }}' disabled>
                            @endif
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-sm-3 col-form-label title">COUNTRY:</label>
                        <div class="col">
                            <select name='country_id' id="country" class="my-form-control backlines editSelects" disabled>
                            @if(Route::current()->getName() == "home")
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
                            @elseif(Route::current()->getName() == "profile")
                                @if($user->country_id == null)
                                    <option>undefined</option>
                                @endif
                                @foreach($countries as $country)
                                    @if($country->country_id == $user->country_id)
                                        <option value="{{$country->country_id}}" selected>{{$country->country_name}}</option>
                                        @continue
                                    @endif
                                    <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="genre" class="col-sm-3 col-form-label title">GENRE:</label>
                        <div class="col">
                            <select id="genre" name='genre_id' class="my-form-control backlines editSelects" disabled>
                            @if(Route::current()->getName() == "home")
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
                            @elseif(Route::current()->getName() == "profile")
                                @if($user->genre_id == null)
                                    <option>undefined</option>
                                @endif
                                @foreach($genres as $genre)
                                    @if($genre->id == $user->genre_id)
                                        <option value="{{$genre->id}}" selected>{{$genre->name}}</option>
                                        @continue
                                    @endif
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="situation" class="col-sm-3 col-form-label title">EMOTIONAL SITUATION:</label>
                        <div class="col">
                            <select id="situation" name='situation_id' class="my-form-control backlines editSelects" disabled>
                            @if(Route::current()->getName() == "home")
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
                            @elseif(Route::current()->getName() == "profile")
                                @if($user->situation_id == null)
                                    <option>undefined</option>
                                @endif
                                @foreach($situations as $situation)
                                    @if($situation->id == $user->situation_id)
                                        <option value="{{$situation->id}}" selected>{{$situation->name}}</option>
                                        @continue
                                    @endif
                                    <option value="{{$situation->id}}">{{$situation->name}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if(auth()->user() && Route::current()->getName() == "home")
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

@if(auth()->user())
<div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="listForm" method="POST" action="{{ url('createlist') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title title" id="exampleModalLabel">New list</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="title" for="nameList">Name</label>
                        <input type="text" class="form-control" name="name" id="nameList" placeholder="Enter name list" required>
                    </div>
                    <div class="form-group">
                        <label class="title" for="exampleFormControlTextarea1">Privacity</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="privacity" name="privacity" class="custom-control-input" value="0" checked>
                            <label class="custom-control-label" for="privacity">Public</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="privacity2" name="privacity" class="custom-control-input" value="1">
                            <label class="custom-control-label" for="privacity2">Private</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="title" for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeList" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create list</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@if(auth()->user())
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="itemForm" method="POST" action="{{ url('createitem') }}">
                @csrf

                <input type="hidden" id="table_id" name="table_id" value="">

                <div class="modal-header">
                    <h5 class="modal-title title" id="exampleModalLabel">New item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="title">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter book name" required>
                        </div>
                        <div class="form-group col">
                            <label class="title">Author</label>
                            <input type="text" class="form-control" name="author" placeholder="Enter author name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label class="title">Editorial</label>
                            <input type="text" class="form-control" name="editorial" placeholder="Enter editorial name" required>
                        </div>
                        <div class="form-group col">
                            <label class="title">Publication Date</label>
                            <input type='text' data-provide="datepicker" class="form-control date" id="publication_date" name="publication_date" placeholder="YY-mm-dd" required readonly>
                        </div>
                        <div class="form-group col">
                            <label class="title">Country</label>
                            <select name='country_id' class="form-control">
                                <option selected disabled>Select</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="title">Synopsis</label>
                            <textarea class="form-control" name="synopsis" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeList" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create item</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@if(auth()->user())
<div class="modal fade" id="itemEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editItemForm" method="POST" action="{{ url('edititem') }}">
                @csrf

                <input type="hidden" id="item_id" name="item_id" value="">

                <div class="modal-header">
                    <h5 class="modal-title title" id="exampleModalLabel">Edit item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="title">Name</label>
                            <input type="text" class="form-control" id="itemName" name="name" placeholder="Enter book name" required>
                        </div>
                        <div class="form-group col">
                            <label class="title">Author</label>
                            <input type="text" class="form-control" id="itemAuthor" name="author" placeholder="Enter author name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label class="title">Editorial</label>
                            <input type="text" class="form-control" id="editorialName" name="editorial" placeholder="Enter editorial name" required>
                        </div>
                        <div class="form-group col">
                            <label class="title">Publication Date</label>
                            <input type='text' data-provide="datepicker" id="publicationDate" class="form-control date" id="publication_date" name="publication_date" placeholder="YY-mm-dd" required readonly>
                        </div>
                        <div class="form-group col">
                            <label class="title">Country</label>
                            <select id="country_id" name='country_id' class="form-control">
                                <option selected disabled>Select</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="title">Synopsis</label>
                            <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeList" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Edit item</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@if(auth()->user())
<div class="modal fade" id="listEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editListForm" method="POST" action="{{ url('editlist') }}">
                @csrf

                <input type="hidden" id="list_id" name="id" value="">

                <div class="modal-header">
                    <h5 class="modal-title title" id="exampleModalLabel">Edit list</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="title" for="nameList">Name</label>
                        <input type="text" class="form-control" name="name" id="name_list" placeholder="Enter name list" required>
                    </div>
                    <div class="form-group">
                        <label class="title" for="exampleFormControlTextarea1">Privacity</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="privacity_list" name="estate" class="custom-control-input" value="0" checked>
                            <label class="custom-control-label" for="privacity_list">Public</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="privacity_list2" name="estate" class="custom-control-input" value="1">
                            <label class="custom-control-label" for="privacity_list2">Private</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="title" for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="description_list" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeList" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Edit list</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection