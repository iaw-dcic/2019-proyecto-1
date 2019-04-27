@extends('layouts.master')

@section('content')
<div class="container">
        <div class="jumbotron">
          <h1>Playlists mas populares</h1>
          <p>Ultimas playlists ordenadas por popularidad en base a los usuarios</p>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <h3>Playlist 1</h3>
            <div class="media">
                    <div class="media-body">
                        <iframe width="400"
                        src="https://www.youtube.com/embed/MgVgt2O_9g8"
                        frameborder="0"
                        allowfullscreen="">
                        </iframe>
                    </div>
                </div>
          </div>
          <div class="col-sm-6">
            <h3>Playlist 2</h3>
            <div class="media">
                <div class="media-body">
                    <iframe width="400"
                    src="https://www.youtube.com/embed/MgVgt2O_9g8"
                    frameborder="0"
                    allowfullscreen="">
                    </iframe>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection
