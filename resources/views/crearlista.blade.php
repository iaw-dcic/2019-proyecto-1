@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New List</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{url('lista/crear')}}">
                        {{csrf_field()}}
                        <p><label for='nombre'>List Name: </label> <input type="text" name="nombre" class="form-control"></p>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="visible" >
                            <label class="custom-control-label" for="customCheck1">Make this list public?</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Create List</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection