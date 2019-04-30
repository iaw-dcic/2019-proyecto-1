@extends('main')

@section('container')


    <div class="jumbotron">
        <div class="text-center">
            <h1>{{ $song->name }}</h1>
            <hr class="half-rule bg-dark"/>
        </div>

        <div class="col-md-12 text-center p-2">
            <img src="{{ asset('images/songs/'.$song->image) }}" class="avatar img-circle img-thumbnail"
                 alt="avatar">
        </div>

        <div class="text-center">
            <h1>Detalles</h1>
            <div class="col-md-12 text-center">
                <h2 class="p-2"><u>Artista</u></h2>
                <h3 class="text-dark p-4">{{$song->artist}}</h3>
                <h2 class="p-2"><u>Album</u></h2>
                <h3 class="text-dark p-4">{{$song->album}}</h3>
                <h2 class="p-2"><u>Género</u></h2>
                <h3 class="text-dark p-4">{{$song->genre}}</h3>
                <h2 class="p-2"><u>Año de Lanzamiento</u></h2>
                <h3 class="text-dark p-4">{{$song->year}}</h3>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/song.js') }}"></script>
    <script src="{{ asset('js/file-utils.js') }}"></script>
@endsection



