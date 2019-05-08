@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Perfil</h1>
    </div>
</div>

<div class="album py-5">
    <div class="container">
        <div class="col-4">
            <h4>Nombre y apellido: </h4>
            <h6>{{ $perfil->name }}</h6>

            <h4>Email </h4>
            <h6>{{ $perfil->email }}</h6>

            <h4>Ciudad</h4>
            <h6>{{ $perfil->ciudad }}</h6>

            <h4>Bio</h4>
            <h6>{{ $perfil->bio }}</h6>
        </div>

        <div class="col-8">
            @foreach ($listasPublicas as $lp)

            <div class="accordion" id="accordionExample">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{$lp->title}}
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <h4>Descripcion</h4>
                        {{$lp->description}}

                        <br><br>
                        <h4>Libros</h4>
                        @foreach ($lp->books as $lpb)
                        <tr>
                            <th scope="row border"> </th>                           
                            <td> <h5>Titulo:</h5> <h6>{{$lpb->title}} </h6></td>
                            <br>                            
                            <td><h5>Autor:</h5> <h6>{{$lpb->author}} </h6></td>
                        </tr>
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a href="/welcome"> Volver</a>
    </div>
</div>

@endsection