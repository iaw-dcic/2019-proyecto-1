
    @if( count($playlists) == 0 && count($songs) == 0 )
        <div class="container p-4 text-center" id="playlist-header">
            <div class="col-md-12">
                <h1>No se encontraron resultados...</h1>
            </div>
        </div>
    @endif

    @if(count($playlists) > 0)
    <div class="container-fluid p-4 row" id="playlist-header">
        <div class="col-md-8">
            <h1>Resultados de Playlists</h1>
        </div>
    </div>

    <div class="col-md-12">
        <table class="table table-dark table-responsive-lg">
            <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Creada por</th>
                <th>Escuchar en Spotify</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($playlists as $playlist)
                <tr class="align-middle" >
                    <td ><div class="text-center"><img src="{{asset('images/playlists/'.$playlist->image)}}"></div></td>
                    <td class="align-middle" >{{$playlist->name}}</td>
                    <td class="align-middle" >{{ (($playlist->user())->first())->username }}</td>
                    @if($playlist->spotify_url != null)
                        <td class="align-middle" ><a href="{{ url($playlist->spotify_url) }}" style="color: #000; text-decoration: none;" ><i class="fab fa-spotify fa-2x"></i></a></td>
                    @else
                        <td class="align-middle" >No se encontro enlace</td>
                    @endif
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    @endif

    @if(count($songs) > 0)
    <div class="container-fluid p-4 row" id="playlist-header">
        <div class="col-md-8">
            <h1>Resultados de Canciones</h1>
        </div>
    </div>

    <div class="col-md-12">
        <table class="table table-dark table-responsive-lg">
            <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Artista</th>
                <th>Album</th>
                <th>Genero</th>
                <th>Año</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($songs as $song)
                <tr class="align-middle" >
                    <td ><div class="text-center"><img src="{{asset('images/songs/'.$song->image)}}"></div></td>
                    <td class="align-middle" >{{$song->name}}</td>
                    <td class="align-middle" >{{$song->artist}}</td>
                    <td class="align-middle" >{{$song->album}}</td>
                    <td class="align-middle" >{{$song->genre}}</td>
                    <td class="align-middle" >{{$song->year}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    @endif

@section('scripts')
    <script src="{{ asset('js/playlist.js') }}"></script>
@endsection















