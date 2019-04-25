@extends('layouts.app')

@section('content')
<div class="container">
    @guest
    ESTO LO VEN LOS INVITADOS Pero no lo ve el usuario logeado
    @else

    ACA VA LA PAPA

    <hr />
    <button type="button" class="btn btn-outline-dark" onclick="location.href='/editProfile';">
        {{ __('Edit profile') }}
    </button>
    @endguest
</div>
@endsection