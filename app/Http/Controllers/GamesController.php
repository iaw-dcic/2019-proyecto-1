<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Game;
use App\User;
use Intervention\Image\Facades\Image;
use Auth;
use App\Listing;

class GamesController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'create','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*  if (Auth::user()) {
            $user_id = auth()->user()->id;

            $listings = Listing::where('user_id', '=', $user_id)->get();
            dd($listings);
            exit;


            $games= [];
            foreach($listings as $listing) {
                array_push($games,$listing->games);
            }

            //Formas de mandar los games:
            //$posts = Post::orderBy('title','desc')->get();
            //$posts = Post::orderBy('created_at','desc')->paginate(10);

          
            return view('pages.games')->with('games', $games);
        } else {
           alert()->info('Atencion!', 'Tenes que iniciar sesión o registrarte para ver tus juegos.');
            return view('pages.games'); }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()) {
            $userListings = auth()->user()->listings()->select('title', 'id')->get();
            return view('games.create')->withListings($userListings);
        } else {
            alert()->info('Atencion!', 'Tenes que iniciar sesión o registrarte para agregar un juego.');
            return redirect()->guest('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required',
            'console' => 'required',
            'rating' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'mode' => 'required',
            'genre' => 'required',
            'listings' => 'required'
        ));

        $fileNameToStore = $this->handleFileUpload($request);

        $game = new Game;
        $game->title = $request->title;
        $game->rating = $request->rating;
        $game->cover_image = $fileNameToStore;
        $game->console = $request->console;
        $game->mode = $request->mode;
        $game->genre = $request->genre;
        $game->save();

        $listings = $request->listings;

        //Attach listing only if doesnt already exists
        foreach ($listings as $listing) {
            if (!$game->listings->contains($listing)) {
                $game->listings()->attach($listing);
            }    
        }

        alert()->success('Listo!', 'El juego fue guardado en tu lista.');
        return redirect('listings');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::find($id);


        $listNames = [];
        foreach ($game->listings as $listing) {
            array_push($listNames, $listing->title);
        }

        $data = [
            'game'  => $game,
            'listings'   => implode(" - ", $listNames),
        ];

        return view('games.game-single')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()) {
            $game = Game::find($id);
            $listings = auth()->user()->listings()->select('title', 'id')->get();
            alert()->info('Atención!', 'Los cambios realizados se reflejarán en todas las listas donde tengas este juego');
            return view('games.edit', compact('game', 'listings'));
        } else {
            alert()->info('Atención!', 'Tenes que iniciar sesión o registrarte para agregar un juego.');
            return redirect()->guest('/login');
        }
        //Check for correct user
        /*if (auth()->user()->id !== $game->user_id) {
            return redirect('/games')->with('error', 'Pagina no autorizada'); //TODO: Ver esto porque no anda, hacer l mismo para eliminar y ver
        }*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required',
            'rating' => 'required',
            'console' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'mode' => 'required',
            'genre' => 'required'
        ));

        $fileNameToStore = $this->handleFileUpload($request);

        $game = Game::find($id);
        $game->title = $request->title;
        $game->rating = $request->rating;
        $game->console = $request->console;
        $game->mode = $request->mode;
        $game->genre = $request->genre;
        if ($request->hasFile('cover_image')) {
            Storage::delete('public/cover_images/thumbnail/' . $game->cover_image);
            $game->cover_image = $fileNameToStore;
        }
        $game->save();

        $listings = $request->listings;
        $game->listings()->sync($listings);

        alert()->success('Listo!', 'El juego fue editado correctamente.');
        return redirect('listings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $game = Game::find($id);

        // Check for correct user
        /* if (auth()->user()->id !== $game->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }*/

        if ($game->cover_image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('public/cover_images/thumbnail/' . $game->cover_image);
        }
        $game->listings()->detach();
        $game->delete();

        alert()->info('Atención!', 'El juego fue eliminado');
        return redirect('games');
    }

    public function removeListing(Game $game)
    { }

    private function handleFileUpload(Request $request)
    {
        // Handle File Upload
        if ($request->hasFile('cover_image')) {

            // Get filename with the extension 
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload Image
            //$request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            $request->file('cover_image')->storeAs('public/cover_images/thumbnail', $fileNameToStore);

           
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        return $fileNameToStore;
    }
}
