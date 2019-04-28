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
                    <textarea class="scrollbar-primary mt-4" style="border-radius:15px; background-color: black;color:#fff;" rows="6" cols="80" id="description" readonly disabled>{{ $user->description }}</textarea>
                    <a href="#listas" class="btn-get-started">Listas de {{ $user->username }}</a>
                    @else
                    <h1>El perfil especificado no existe</h1>
                    @endif
                </div>

            </div>
</section><!-- #hero -->

<!--==========================
      Portfolio Section
    ============================-->
<section id="listas">
    <div class="wow fadeInUp col-lg-12 paddingSeccion">
        <div class="section-header">
            <h3 class="section-title">Listas de {{ $user->username }}</h3>
        </div>
        <div class="panel panel-primary text-center sectionSize">
            <div class="panel-body sectionSize scrollbar-primary">
                <ul class="list-group">
                    @foreach($listas as $lista)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="/lists/{{$lista->id}}">{{$lista->listname}}</a>
                        <div>
                            <span class="badge badge-success badge-pill">{{$lista->likes}} Likes</span>
                            <span class="badge badge-success badge-pill">{{$lista->views}} Vistas</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/filtrar.js') }}"></script>
</section><!-- #portfolio -->
@endsection