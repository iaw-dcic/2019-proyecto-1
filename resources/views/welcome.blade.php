@extends('layouts.app')

@section('content')

    <div class="container">
     
      @if (! empty($users))

      <div class="row">

  @foreach($users as $user )

  <div class="card" style="width: 18rem;">
  <img src="/uploads/avatars/{{$user->avatar}}">
  <div class="card-body">
    <h5 class="card-title">Usuario</h5>
    <p class="card-text">{{$user->name}}</p>
    <a href="{{ route('showUser',['id' => $user->id]) }}" class="btn btn-primary">Show Profile</a>
  </div>
</div>
  
  

  @endforeach    
  </div>
  
@endif
      
      

    
            
    </div>
   

@endsection

