@auth
@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header"><h2>My Inventories<a class="btn btn-small btn-success" href="inventories/create">Add an Inventory</a></h2></div>
            <div class="card-body">
            @if (Auth::user()->inventories->count())
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Title</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>                
                        @foreach($inventories as $key => $value)
                            @if($value->user_id == Auth::user()->id)
                                <tr>
                                    <td>{{ $value->title }}</td>
                                    <td>@if ($value->public_status==1) Public @else Private @endif</td>
                                    <td>
                                        <a class="btn btn-small btn-success" href="{{ URL::to('inventories/' . $value->id) }}">See Inventory</a>
                                        <a class="btn btn-small btn-primary" href="{{ URL::to('inventories/' . $value->id . '/edit') }}">Edit Inventory</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                
                    </tbody>
                </table>
            @else
                There is no inventory to show!
            @endif
            </div>
        </div>
</div>
@endsection            
@endauth
