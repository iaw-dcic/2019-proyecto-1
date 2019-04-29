@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header"><h2>All Public Inventories</h2></div>
            <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Information</td>
                    </tr>
                </thead>
                <tbody>
                @auth
                @foreach($inventories as $key => $value)
                    @if($value->user_id == Auth::user()->id)                                       
                            <tr>
                                <td>{{ $value->title }}</td>    
                                <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('inventories/' . $value->id) }}">See Inventory</a>
                                    <a class="btn btn-small btn-primary" href="{{ URL::to('inventories/' . $value->id . '/edit') }}">Edit Inventory</a>
                                </td>
                            </tr>
                    @elseif($value->public_status==1)
                    <tr>
                                <td>{{ $value->title }}</td>    
                                <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('inventories/' . $value->id) }}">See Inventory</a>
                                    <a class="btn btn-small btn-primary" href="/users/{{{$value->user_id}}}">See Owner's Profile</a>
                                </td>
                            </tr>
                    @endif
                @endforeach
                @else
                    @foreach($inventories as $key => $value)
                        @if($value->public_status==1)
                            <tr>
                                <td>{{ $value->title }}</td>    
                                <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('inventories/' . $value->id) }}">See Inventory</a>
                                    <a class="btn btn-small btn-primary" href="/users/{{{$value->user_id}}}">See Owner's Profile</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endauth
                </tbody>
            </table>
            </div>
        </div>
</div>
@endsection            

