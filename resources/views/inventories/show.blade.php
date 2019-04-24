@extends('layouts.app')

@section('content')             

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Inventory</div>

                @if ($inventory->articles->count())
                    <div class="card-body">                
                        @foreach ($inventory->articles as $article)
                        <li>
                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">
                                    Car: {{ $article->title }} / FabricationYear: {{$article->fabricationYear}} / Price: ${{$article->price}}</label>
                                </div>
                        </li>
                        @endforeach                
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection('content')