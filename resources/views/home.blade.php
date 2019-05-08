@extends('layouts.app')
{{--  jquery  --}}


@section('content')



@if($lists->isNotEmpty())
<div id="accordion">
        @foreach ($lists as $list)

        @if($list->isPublic==1)

                <h3>{{$list->name}} creada por {{ App\User::where('id',$list->user_id)->first()->name}}</h3>
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
                 </div>
        @endif
        @endforeach
</div>
@else
<p>No se han creado listas todavía</p>
@endif


{{--
     <div class="list-group">

            <div data-role=collapsible>

            </div>
        @endforeach
    </div>

--}}

@endsection
