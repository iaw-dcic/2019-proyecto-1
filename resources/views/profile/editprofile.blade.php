@extends('layouts.app')

@section('sectioncontent')
<section id="hero">
    <div class="hero-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img width="100px" height="100px" class="rounded-circle" src="{{ asset('uploads/avatars/'.$user->avatar) }}">
                <h2>{{ $user->name }}</h2>
                <h4>Edit avatar</h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar (optional)') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section><!-- #hero -->
@endsection