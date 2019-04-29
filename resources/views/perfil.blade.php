@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de  {{$user->name}}</div>

                <div class="card-body">                    
                     <p style="text-align: center;"><i class="fas fa-envelope"></i>{{$user->email}}</p>
                      <p style="text-align: center;"><i class="fas fa-atlas"></i>{{$user->biografia}}</p>
                    

                    
                        <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Ir..</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($listas as $lista)
                            <tr>
                                <th scope="row">{{ $lista->id}}</th>
                                <td>{{ $lista->nombre}}</td>
                                <td><a type="button" class="btn btn-primary" href="/lista/get/{{$lista->id}}"><i class="fas fa-eye"></i></a></td>                                
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