@extends('layouts.app')


@section('content')


    @if(Session::has('message'))
        <p class="alert alert-danger">{{ Session::get('message') }}</p>
    @endif

    @if($lists->isNotEmpty())
        <div id="accordion">
        @foreach ($lists as $list)

                @if($list->isPublic==1)
                     <h3>{{$list->name}}: lista publica creada el {{ $list->created_at}}
                @else
                     <h3>{{$list->name}}: lista privada creada el {{ $list->created_at}}
                @endif
                    </h3>
                <div>
                <table class="table table-sm table-dark table-hover bordered">
                        <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Club</th>
                        <th scope="col">Estadio</th>
                        <th scope="col">Capacidad</th>
                        <th scope="col">Pais</th>
                        </tr>
                        </thead>
                        @foreach($items as $item)
                            @if($item->list_id == $list->id)
                                 <tbody>
                                        <tr>
                                                <th scope="row"></th>
                                                <td>{{ $item->nombre_club }}</td>
                                                <td>{{ $item->nombre_estadio }}</td>
                                                <td>{{ $item->capacidad_estadio }}</td>
                                                <td>{{ $item->pais }}</td>
                                        </tr>
                                 </tbody>
                            @endif
                        @endforeach
                </table>
                <div data-role="controlgroup" data-type="horizontal" >
                        <a href="{{ route('users.editLista', $list->id)}}" data-ajax="false" class="btn btn-warning" data-role="button" data-icon="forward">Editar</a>
                        <a href="{{ route('users.destroy', $list->id)}}" data-ajax="false" class="btn btn-danger" data-role="button" data-icon="delete" >Eliminar</a>
                </div>
            </div>
        @endforeach
        </div>


     @else
        <p>No se han creado listas todavía</p>
    @endif





 @endsection

