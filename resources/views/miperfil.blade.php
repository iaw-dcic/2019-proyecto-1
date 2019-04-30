@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$user->name}}'s Profile <a type="button" class="btn btn-primary" href="/miperfil/editar">Edit Profile <i class="fas fa-edit"></i></a></div>

                <div class="card-body">                    
                     <p style="text-align: center;"><i class="fas fa-envelope"></i>{{$user->email}}</p>
                      <p style="text-align: center;"><i class="fas fa-atlas"></i>{{$user->biografia}}</p>
                              
                        
                         <div class="col-md-12 text-right"> 
                            <a type="button" class="btn btn-primary" href="/lista/crear/" >Add new Movie List <i class="fas fa-plus-circle"></i></a>
                          </div>
                        <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Go..</th>
                          <th scope="col">Remove </th>

                        </tr> 
                      </thead>
                      <tbody>
                         @foreach ($listas as $lista)
                            <tr>
                                <th scope="row">{{ $lista->id}}</th>
                                <td>{{ $lista->nombre}}</td>
                                <td><a type="button" class="btn btn-primary" href="/lista/modificar/{{$lista->id}}"><i class="fas fa-edit"></i></a></td>
                                <td><a type="button" class="btn btn-primary" href="/lista/eliminar/{{$lista->id}}"><i class="fas fa-trash"></i></a></td>                                
                            </tr>
                        @endforeach
                        
                        
                      </tbody>
                    </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection