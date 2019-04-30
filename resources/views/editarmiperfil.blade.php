@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">                    
                        
                        <form method="POST" action="{{url('miperfil/editar')}}">
                          {{csrf_field()}}
                          
                          <p><label for='nombre'>Name: </label> <input type="text" name="name" class="form-control" value="{{$usuario->name}}"></p>
                          <p><label for='visible'>Email: </label> <input type="text" name="email" class="form-control" value="{{$usuario->email}}"></p>
                          <p><label for='visible'>Bio: </label> <input type="text" name="biografia" class="form-control" value="{{$usuario->biografia}}"></p>
                          <button type="submit" class="btn btn-primary">Save</button>
                       </form>
                       
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection