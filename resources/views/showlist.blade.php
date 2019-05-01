@extends('layout')

@section('head')
	@parent
	<link href="{{asset('css/show.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="d-flex justify-content-center h-100">
        <div class="card text-center" style="width: 30rem; height:25rem">
            <div class="card-header">
                <h3>{{$list->name}}</h3>
                <div class="d-flex justify-content-end table_icon">
					  <span><i class="fas fa-film"></i></span>
				</div>
                <table class="table" style="margin-bottom:-14px;">
                <thead>
                        <th>Película</th>
                        <th>Director</th>
                        <th>Género</th>  
                </thead>
                </table>
            </div>
            <div class="card-body" style="overflow-y:scroll" >
                <table class="table" style="margin-top:-20px;">
                    <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{ $movie->name}}</td>
                                <td>{{ $movie->director}}</td>
                                <td>{{ $movie->genre}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection