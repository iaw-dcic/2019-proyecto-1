@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Delete collection') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('collections.destroy', $collection) }}">
                            @csrf
                            {{ method_field('delete') }}
                            <p class="card-text">Are you sure you want to delete the {{$collection->name}} collection?</p>
                            <button type="submit" class="btn btn-danger">Confirm</button>
                            <a href="/" class="btn btn-secondary">
                                {{ __('Cancel') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection