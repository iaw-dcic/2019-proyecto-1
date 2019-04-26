@extends('layouts.appIndex')

@section('contenido')

<div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                {{$user->name}}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Email: {{$user->email}}</li>
                <li class="list-group-item">Apellido: {{$user->profile->Apellido}}</li>
                <li class="list-group-item">Ciudad: {{$user->profile->Ciudad}}</li>
            </ul>
        </div>
        @foreach ($listasPublicas as $listas)
        @if ($listas->libros->count() !== 0)
        <tr>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Genero</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listas->libros as $libro)
                        <tr>
                        <th scope="row border"> </th>
                        <td>{{$libro->Titulo}}</td>
                        <td>{{$libro->Genero}}</td>
                        <td>{{$libro->Autor}}</td>
                        </tr>          
                    @endforeach 
                </tbody>
            </table>
           </tr>                    
        @endif
    @endforeach
</div>
@endsection  