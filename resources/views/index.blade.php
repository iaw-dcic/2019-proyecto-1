@extends('layouts.appIndex')

@section('contenido')
    <!-- Page Features -->
    <div class="row text-center">

      @foreach ($listaDeBienes as $item)
        <div class="col-lg-3 col-md-2 m-2 p-2">
          <div class="card h-100">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
          </div>
        </div>
      @endforeach 

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection  