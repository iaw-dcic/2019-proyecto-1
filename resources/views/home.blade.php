@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de Control</div>
                    <div class="card-body">
                            <center><a class="btn btn-primary btn-lg" href="{{route('book.index') }}">Mis Libros</a></center>
                    </div>
                    
                    <div class="card-body">
                            <center><a class="btn btn-primary btn-lg" href="{{route('list.index') }}">Mis Listas</a></center>
                    </div>
            
                            
                                
                        
                    



                
            </div>
        </div>
    </div>
</div>
@endsection
