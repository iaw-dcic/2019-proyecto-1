<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Song;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{

    public function searchIndex(Request $request)
    {
        $search = $request->get('term');

        $playlists = Playlist::where('name', 'LIKE', '%'. $search. '%')->where('visibility', 'LIKE' ,"Publica")->get();

        $songs = Song::where('name', 'LIKE', '%'. $search. '%')
                ->orWhere('artist', 'LIKE', '%'. $search. '%')
                ->orWhere('album', 'LIKE', '%'. $search. '%')
            ->get();

        $busqueda = view('playlist.search-results')
            ->with('playlists', $playlists)
            ->with('songs',$songs)
            ->render();

        return response()->json(array('success' => true, 'html' => $busqueda));
    }

    public function searchUser(Request $request)
    {
        $search = $request->get('term');

        $result = User::where('name', 'LIKE', '%'. $search. '%')->get();

        return response()->json($result);

    }

    public function searchPlaylist(Request $request)
    {
        $search = $request->get('term');

        $results = Playlist::where('name', 'LIKE', '%'. $search. '%')->where('visibility', 'LIKE' ,"Publica")->get();

        $playlistNames = array();

        foreach($results as $result ){
            $playlistNames[] =($result->name);
        }

        $playlistNames = array_unique($playlistNames);

        return response()->json($playlistNames);
    }

    public function searchArtist(Request $request)
    {

        $search = $request->get('term');

        $results = Song::where('artist', 'LIKE', '%'. $search. '%')->get();

        $artists = array();

        foreach($results as $result ){
            $artists[] =($result->artist);
        }

        $artists = array_unique($artists);

        return response()->json($artists);

    }

    public function searchAlbum(Request $request)
    {
        $search = $request->get('term');

        $results = Song::where('album', 'LIKE', '%'. $search. '%')->get();

        $albums = array();

        foreach($results as $result ){
            $albums[] =($result->album);
        }

        $album = array_unique($albums);

        return response()->json($albums);

    }

    public function searchSongName(Request $request)
    {
        $search = $request->get('term');

        $results = Song::where('name', 'LIKE', '%'. $search. '%')->get();

        $names = array();

        foreach($results as $result ){
            $names[] =($result->name);
        }

        $names = array_unique($names);

        return response()->json($names);

    }
}