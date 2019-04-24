@extends('layouts.app')

@section('content')

    <div class="container">
     
      @if (! empty($users))

      <div class="row">

  @foreach($users as $user )
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
          <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/115098447" allowfullscreen></iframe>
        </div>

        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>

  @endforeach    
  </div>
  
@endif
      
      

    
            
    </div>
    </div>

@endsection

