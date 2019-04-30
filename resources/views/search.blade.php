@extends('layouts.homelink')

@section('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/wrappers.css') }}">
	<link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection

@section('content')
	<h1>Search results</h1>
	@if($lists->isNotEmpty())
		@component('home.homeposts', compact('lists'));
		@endcomponent
	@else
		Sorry, we couldn't find any lists matching that name
	@endif
@endsection
