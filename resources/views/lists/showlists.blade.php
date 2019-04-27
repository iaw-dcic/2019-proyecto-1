@extends('layouts.app')

@section('title')
	Listas de {{ auth()->user()->name }}
@endsection

@section('content')

	<ul>
	@foreach($lists as $list)
		<li>{{ $list->name }}</li>
	@endforeach
	</ul>

	<a href="/lists/create">
		<button type="button" class="btn btn-primary">
        	{{ __('Añadir nueva lista') }}
    	</button>
    </a>

@endsection