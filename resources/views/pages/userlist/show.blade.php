@extends('layouts.app')

@section('content')

<div class="container">
  <div class="backicon">
      <a href="/userlists">
        <img src = "{{ asset('/img/back-arrow.png') }}"/>
      </a>
  </div>

  <div class="row h-100 align-items-center justify-content-center text-center">
      <div class="circular">
          @if($userlist->image)
              <img id="profileImage"  src="{{ $userlist->image }}">
          @else 
              <img id="profileImage" src="{{ asset('img\userlists-pictures\userlist-placeholder.jpg') }}">
          @endif
      </div>
  </div>
</div>

<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">{{ $userlist->title }}</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-3 wrappedDescription">{{ $userlist->description }}</p>
        </div>
        <div class="col-lg-8 align-self-baseline">
            <p class="text-white-50 font-weight-light text-right">Made by <a href="/profile/{{ $userlist->user_id }}">{{ $userlist->user->username }}</a></p>
        </div>
      </div>
    </div>
</header>


@if (Auth::check() && Auth::user()->id == $userlist->user_id)
<div class="container pb-2">
  <div class="text-right">
    <p class="text-white-75 font-weight-light mb-0">Public</p>
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
  </div>
  <div class="dropdown text-right">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Options
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateListModal">Update list</a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteListModal">Delete list</a>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteListModal" tabindex="-1" role="dialog" aria-labelledby="deleteListLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteListLabel">Delete list</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p> Are you sure you want to delete the list {{ $userlist->title }}?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form method="POST" action="/userlists/{{ $userlist->id }}">
            @method('DELETE')
            @csrf
            <div>
                <button type="submit" class="btn btn-danger">Delete list</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updateListModal" tabindex="-1" role="dialog" aria-labelledby="updateListLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateListLabel">Update list</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="/userlists/{{ $userlist->id }}" role="form" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
          <div class="modal-body">
              <div>
                  <h5>List picture</h5>
                  <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" id="customFile" name="userlist_picture">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
              </div>
              <div>
                  <h5>Title</h5>
                  <input type="text" name="title" value="{{ $userlist->title }}" required maxlength="30">
              </div>
              <hr>
              <div>
                  <h5>Description</h5>
                  <textarea name="description" rows="5" required maxlength="200"> {{ $userlist->description }}</textarea>
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


@if ($userlist->elements->count())
<table class="table transparent">
    <thead class="thead-light">
      <tr>
        <th scope="col" style="width: 10%">Name</th>
        <th scope="col" style="width: 70%">Description</th>
          @if (Auth::check() && Auth::user()->id == $userlist->user_id)
            <th scope="col" style="width: 10%">Edit</th>
            <th scope="col" style="width: 10%">Delete</th>
          @endif
      </tr>
    </thead>
    <tbody>
    <div>
        @foreach ($userlist->elements as $element)
            <tr>
                <th scope="row">{{ $element->name }}</th>
                <td>{{ $element->description }}</td>
                @if (Auth::check() && Auth::user()->id == $userlist->user_id)
                  <td><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editElementModal{{ $loop->index }}">Edit element</button></td>
                  <form method="POST" action="/listelements/{{ $element->id }}">
                    @method('DELETE')
                    @csrf
                    <td><button type="submit" class="btn btn-primary">Delete element</button></td>
                  </form>
                  <div class="modal fade" id="editElementModal{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="editElementModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-sm">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="editElementModalLongTitle">Edit element</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                              <form method="POST" action="/listelements/{{ $element->id }}">
                                  @method('PATCH')
                                  @csrf
                                  <div class="modal-body">
                                      <div>
                                          <h5>Name</h5>
                                          <input type="text" name="name" value="{{ $element->name }}" maxlength="30" required>
                                      </div>
                                      <hr>
                                      <div>
                                          <h5>Description</h5>
                                          <textarea name="description" rows="5" required maxlength="200">{{ $element->description }}</textarea>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                @endif
            </tr>
        @endforeach
    </div>
    </tbody>
</table>
@else

<div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center text-center">
      <div class="col-lg-8 align-self-baseline">
          <hr class="hr-text">
        <p class="text-white-75 font-weight-light mb-5">This list is currently empty.</p>
      </div>
    </div>
</div>

@endif

@auth
@if (Auth::user()->id == $userlist->user_id)
<div class="text-center pt-2">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newElementModal">
    Add entry
  </button>
</div>

<div class="modal fade" id="newElementModal" tabindex="-1" role="dialog" aria-labelledby="newElementModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newElementModalLongTitle">Add a new entry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" action="/userlists/{{ $userlist->id }}/listelements">
                @csrf
                <div class="modal-body">
                    <div>
                        <h5>Name</h5>
                        <input type="text" name="name" placeholder="Name of the new entry" maxlength="30" required>
                    </div>
                    <hr>
                    <div>
                        <h5>Description</h5>
                        <textarea name="description" rows="5" placeholder="Description of the new entry" maxlength="200" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add entry</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endif
@endauth

@endsection