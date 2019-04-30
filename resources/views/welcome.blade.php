@extends('layouts.app')

@section('content')

<div class="parallax"></div>


    <div class="container">



    <

     
      @if (! empty($users))

      <div class="row">

  

  </div>

  <table id="albums">
    <thead>
        <tr>
           
            <th>Nick</th>
            <th>Imagen</th>
            <th></th>
        </tr>
     </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
            <td>{{$user->name}}</td>
            <td> <img src="/uploads/avatars/{{$user->avatar}}" class="rounded-circle" width="50" height="50" id="content-img"></td>
            <td><a href="{{ route('showUser',['id' => $user->id]) }}" class="btn btn-primary">Ver perfil</a></td>
            </tr>
            @endforeach


        </tbody>

    </table>
  
@endif
      
      

    
            
    </div>
   

@endsection

