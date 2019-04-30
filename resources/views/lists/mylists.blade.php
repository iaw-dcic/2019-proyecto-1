@extends('layouts.app')

@section('sectioncontent')
<section id="hero">
    <div class="hero-container2 display: table">
        <div class="row">
            <div class="col-10 col-sm-10 col-md-10 col-lg-10 offset-1 offset-sm-1 offset-md-1 offset-lg-1">
                <div class="mylistsdiv scrollbar-primary">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Genero</th>
                                <th>Descripcion</th>
                                <th>Visibilidad</th>
                                <th>Vistas</th>
                                <th>Likes</th>
                                <th>Ultima Modificacion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listas as $lista)
                            <tr>
                                <td><a href="/lists/{{$lista->id}}">{{$lista->listname}}</a></td>
                                <td>{{$lista->genre}}</td>
                                <td><textarea readonly disabled class="scrollbar-primary" style="border-radius:15px" cols="45" rows="3">{{$lista->description}}</textarea></td>
                                <td>{{ $lista->visibility ? __('Público') : __('Privado') }}</td>
                                <td>{{$lista->views}}</td>
                                <td>{{$lista->likes}}</td>
                                <td>{{$lista->updated_at}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm ml-2 mb-2" onclick="window.location='mylists/{{$lista->id}}';">Ver/Editar</button>
                                    <form method="POST" action="{{ route('delete-list') }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="list_id" value="{{$lista->id}}" />
                                        <button type="submit" class="btn btn-danger btn-sm ml-2">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection