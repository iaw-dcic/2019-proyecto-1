@extends('layouts.app')

@section('sectioncontent')
<section id="hero">
    <div class="hero-container">
        <div class="row">
            <div class="row">
                <div class="hero-container">
                    @if($user['username'])
                    <h1>Perfil de {{ $user->username }}</h1>
                    <img width="100px" height="100px" class="rounded-circle" src="{{ asset('uploads/avatars/'.$user->avatar) }}">
                    <h2>We are team of talanted designers making websites with Bootstrap</h2>
                    <a href="#about" class="btn-get-started">Get Started</a>
                    @else
                    <h1>El perfil especificado no existe</h1>
                    @endif
                </div>

            </div>
</section><!-- #hero -->
@endsection