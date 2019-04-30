@extends('main')

@section('headers')
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <style type="text/css" id="slider-css"></style>
@endsection

@section('container-fluid')

    <div id="carousel-results">

        @if(count($playlists) > 0 )

            <div class="container text-center">
                <h1>Lo mas destacado</h1>
                <hr class="half-rule"/>
            </div>
            <!-- Top content -->
            <div class="top-content">
                <div class="container-fluid dark">
                    <div id="carousel-1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner row w-100 mx-auto" role="listbox">

                            <?php $count = 1;?>

                            @foreach($playlists as $playlist)

                                @if($count == 1 )
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                                        @else
                                            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                                                @endif
                                                <br>
                                                <img class="card-img-top"
                                                     src="{{asset('images/playlists/'.$playlist->image)}}"
                                                     alt="{{'img'.$playlist->id}}" style="height: 225px; width: 100%;">
                                                <div class="card-body">
                                                    <hr class="half-rule"/>
                                                    <h5 class="card-text text-center">{{$playlist->name}}</h5>
                                                    <hr class="half-rule"/>
                                                    <div class="align-items-center">
                                                        <div class="text-center p-3">
                                                            <a href="{{ route('playlist.details', $playlist->id) }}"
                                                               class="btn btn-outline-secondary">Ver
                                                                contenido</a>
                                                        </div>
                                                        <hr class="half-rule"/>
                                                        <div class="text-center">
                                                            @if($playlist->spotify_url != null)
                                                                <a href="{{ url($playlist->spotify_url) }}"
                                                                   style="color: #000; text-decoration: none;"><i
                                                                            class="fab fa-spotify fa-2x"></i></a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php $count++;?>

                                            @endforeach

                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                        </div>
                    </div>
                </div>
        @else
            <div class="container text-center">
                <h1>No hay playlist publicas hasta el momento</h1>
                <hr class="half-rule"/>
            </div>
        @endif

        </div>

        <div id="ajax"></div>

@endsection


@section('scripts')
        <script src="{{ asset('js/carousel.js') }}"></script>
@endsection
