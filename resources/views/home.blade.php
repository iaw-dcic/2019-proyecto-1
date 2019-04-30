@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listas</div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table">
                            <tr>
                                <th>ID Lista</th>
                                <th>Nombre</th>
                                <th>User id</th>
                                <th></th>
                            </tr>
                            @foreach($lists as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->user_id }}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{url('list/'.$list->id)}}">Ver</a></td>
                            </tr>
                            @endforeach
                            

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
