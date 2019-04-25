@extends('layouts.app')

@section('sectioncontent')
<section id="hero">
    <div class="hero-container wow fadeInUp">
        <h1>Bienvenido</h1>
        <h2></h2>
        <a href="#portfolio" class="btn-get-started">Listas Públicas</a>
    </div>
</section><!-- #hero -->

<!--==========================
      Portfolio Section
    ============================-->
<section id="portfolio">
    <div class="wow fadeInUp col-lg-12">
        <div class="section-header">
            <h3 class="section-title">Listas Publicas</h3>
        </div>
        <div class="panel panel-primary text-center">
            <div class="panel-heading">
                <form method="POST" action="{{ route('home-filter') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="section-title">Filtrar Por</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="genre" class="col-form-label">{{ __('Genero') }}</label>
                                    <select id='genre' name="genre">
                                        <option value="all">{{'Todos'}}</option>
                                        @foreach($generos as $genero)
                                        <option value="{{$genero->genre}}">{{$genero->genre}}</option>
                                        @endforeach
                                    </select>
                                    <label for="orderby" class="col-form-label">{{ __('Ordenar Por') }}</label>
                                    <select id='orderby' name="orderby">
                                        <option value="recent">{{'Más Reciente'}}</option>
                                        <option value="likes">{{'Más Likes'}}</option>
                                        <option value="views">{{'Más Vistas'}}</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm ml-2 filtrar-backgound">Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-body additemsdiv scrollbar-primary">
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