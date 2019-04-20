<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Game;
use App\User;
use Intervention\Image\Facades\Image;
use Auth;


class GamesController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $user_id = auth()->user()->id;
            //$posts = Post::orderBy('title','desc')->get();
            //$posts = Post::orderBy('created_at','desc')->paginate(10);

            $games = Game::where('user_id', '=', $user_id)
                ->orderBy('title', 'ASC')
                ->paginate(9);
               
            return view('pages.games')->with('games', $games);
        } else {
            alert()->info('Atencion!', 'Tenes que iniciar sesión o registrarte para ver tus juegos.');
            return redirect()->guest('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()) {
            return view('games.create');
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
            'cover_image' => 'image|nullable|max:1999'
        ));

        $fileNameToStore = $this->handleFileUpload($request);

        $game = new Game;
        $game->user_id = auth()->user()->id;
        $game->title = $request->title;
        $game->rating = $request->rating;
        $game->cover_image = $fileNameToStore;
        $game->console = $request->console;
        $game->save();

        alert()->success('Listo!', 'El juego fue guardado en tu lista.');
        return redirect('games');
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
        return view('games.game-single')->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $game = Game::find($id);
        //Check for correct user
        /*if (auth()->user()->id !== $game->user_id) {
            return redirect('/games')->with('error', 'Pagina no autorizada'); //TODO: Ver esto porque no anda, hacer l mismo para eliminar y ver
        }*/

        return view('games.edit')->with('game', $game);
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
            'cover_image' => 'image|nullable|max:1999'
        ));

        $fileNameToStore = $this->handleFileUpload($request);

        $game = Game::find($id);
        $game->title = $request->title;
        $game->rating = $request->rating;
        $game->console = $request->console;
        if ($request->hasFile('cover_image')) {
            $game->cover_image = $fileNameToStore;
        }
        $game->save();

        alert()->success('Listo!', 'El juego fue editado correctamente.');
        return redirect('games');
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
        if (auth()->user()->id !== $game->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if ($game->cover_image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('public/cover_images/' . $game->cover_image);
        }

        $game->delete();
        alert()->info('Atención!', 'El juego fue eliminado');
        return redirect('games');
    }

    protected function handleFileUpload(Request $request)
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

            //Resize image here
            $thumbnailpath = public_path('storage/cover_images/thumbnail/' . $fileNameToStore);
            $img = Image::make($thumbnailpath)->resize(220, 220, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        return $fileNameToStore;
    }
}
