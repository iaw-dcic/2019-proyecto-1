@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-sm-6">
<div class="card">
<div class="card-header">Listas públicas</div>
<div class="card-body">

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Usuario</th>
      <th scope="col">Nombre Lista</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    @foreach($lists as $list)

    @if ((Auth::check() and ($list->share=='1' or Auth::user()->id==$list->user_id)) or (Auth::guest() and $list->share=='1'))

    <tr>
      <th>{{\App\User::findorfail($list->user_id)->name}}</th>
      <th>{{$list->name}}</th>
      <th>
      <div class="row">
            <form method="GET" action="/list/{{$list->id}}">
                <button type="submit" class="btn btn-primary">Ver</button>
            </form>
            <form method="GET" action="/profile/{{$list->user_id}}">
                <button type="submit" class="btn btn-secondary">Perfil</button>
            </form>
        </div>
      </th>
    </tr>

    @endif

    @endforeach
  </tbody>
</table>

</div>
</div>
</div>
</div>
</div>
</div>



@endsection