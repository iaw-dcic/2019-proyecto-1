@extends('layouts.app')

@section('content')
<div class="container">
    
    <hr>
    <form>
    <div class="form-row">
        <div class="col-4">
        <input type="text" class="form-control" placeholder="City">
        </div>
        <div class="col">
        <input type="text" class="form-control" placeholder="State">
        </div>
        <div class="col">
        <input type="text" class="form-control" placeholder="Zip">
        </div>
        <div>
            <button type="submit" class="btn btn-outline-dark">Save</button>
        </div>
    </div>
    
    </form>

</div>
@endsection