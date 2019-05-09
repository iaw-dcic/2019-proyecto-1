@extends('layouts.app')


@section('content')
    <div class="page-header card bg-info text-center">
        <h2 class="font-italic">{{ $user->name }}</h2>
    </div>


    @if($lists->isNotEmpty())
        <div id="accordion">
        @foreach ($lists as $list)

                @if($list->isPublic==1)
                     <h3 >{{ $user->name }} publico: {{$list->name}} el {{ $list->created_at}}  </h3>

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
        <p>El usuario no ha publicado listas hasta el momento.</p>
    @endif





 @endsection

