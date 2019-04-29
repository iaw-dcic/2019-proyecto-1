@extends('layouts.app')

@section('content')             

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h2>Inventory: {{$inventory->title}} 

                @guest
                <a class="btn btn-small btn-info" href="/users/{{{$inventory->user_id}}}">See Owner's Profile</a>
                @elseif($inventory->user_id==Auth::user()->id)
                <a class="btn btn-small btn-success" href="{{$inventory->id}}/create">Add a Car</a>
                @endif
                </h2>
            </div>
                @if ($inventory->articles->count())
                    <div class="card-body">
                    <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>Car</td>
                                <td>Fabrication Year</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            <tbody>                        
                                    @foreach ($inventory->articles as $article)                            
                                    <tr>

                                        <td>{{ $article->title }}</td>    
                                        <td>{{ $article->fabricationYear }}</td>    
                                        <td>{{ $article->estado }}</td>     
                                        @guest
                                        @elseif($article->user_id==Auth::user()->id)                                       
                                        <td>                                            
                                            <a class="btn btn-small btn-primary" href="/articles/{{$article->id}}/edit">Edit Car</a>  
                                            <form method="POST" action="/articles/{{$article->id}}">    
                                                @csrf
                                                @method('DELETE')                           
                                                <button type="submit" class="btn btn-danger "> {{ __('Delete Car') }} </button>
                                            </form>                                                   
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach 
                            </tbody>
                        </table>
                    </div>
                @else 
                <div class="card-body">This inventory is empty!</div>
                @endif 
            </div>
        </div>
    </div>
@endsection('content')