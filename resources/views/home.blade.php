@extends('layouts.app')
{{--  jquery  --}}
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
@section('content')


@if($lists->isNotEmpty())
     <div class="list-group">
         @foreach ($lists as $list)

            <div data-role=collapsible>
            @if($list->isPublic==1)
            <h4>{{$list->name}} creada por {{ App\User::where('id',$list->user_id)->first()->name}}</h4>
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
            @endif
            </div>
        @endforeach
    </div>

 @else
    <p>No se han creado listas todavía</p>
@endif

@endsection
