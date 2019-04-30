@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('title')
{{$user->name}} - Listas
@endsection

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">Listas de {{$user->name}}</div>
        <div class="card-body">

          @if(Auth::check() and Auth::user()->id==$user->id)
          <form method="GET" action="/list/create">
            <button type="submit" class="btn btn-primary">Agregar lista</button>
          </form>
          @endif

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nombre Lista</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

              @foreach($lists as $list)

              @if ((Auth::check() and ($list->share=='1' or Auth::user()->id==$list->user_id)) or (Auth::guest() and $list->share=='1'))
              <tr>
                <th>{{$list->name}}</th>
                <th>
                  <div class="row">
                    <form method="GET" action="/list/{{$list->id}}">
                      <button type="submit" class="btn btn-primary">Ver</button>
                    </form>
                    @auth
                    @if (Auth::user()->id==$user->id)
                    <form method="POST" action="/list/{{$list->id}}">
                      {{method_field('DELETE')}}
                      {{csrf_field()}}
                      <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                    @endif
                    @endauth
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