@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card container well">
                <div class="card-header text-center"><h3>Verifica tu Email</h3></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success text-center" role="alert">
                            <p>Un link de verificación a sido envidado a tu email.</p>
                        </div>
                    @endif
                    <p class="text-center">Antes de proceder, por favor comprueba tu email por un link de verificación.</p>
                    <p class="text-center">Si no recibiste el mail,<a href="{{ route('verification.resend') }}">click aquí</a> para enviar otro.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
