<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Game;
use Auth;
use App\Http\Middleware\CheckListingPrivacy;

class ListingsController extends Controller
{


    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'create', 'show', 'getUserListings']]);

        $this->middleware('listing.privacy', ['only'=>['edit','update','store','destroy']]);
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
            $listings = Listing::where('user_id', '=', $user_id)->get();

            $data = [
                'listings'  => $listings,
                'listOwnerName'   => Auth::user()->name,
            ];

            return view('listings.listing-index')->withData($data);
        } else {
            alert()->info('Atención!', 'Tenes que iniciar sesión o registrarte para crear o ver tus listas.');
            return view('listings.listing-search');
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
            return view('listings.listing-create');
        } else {
            alert()->info('Atencion!', 'Tenes que iniciar sesión o registrarte para crear una lista.');
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
            'visibility' => 'required',
        ));

        $listing = new Listing;
        $listing->title = $request->title;
        $listing->visibility = $request->visibility;
        $listing->user_id = auth()->user()->id;
        $listing->save();

        alert()->success('Listo!', 'La lista fue creada');
        return view('listings.listing-show')->withListing($listing);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        return view('listings.listing-show')->withListing($listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('listings.listing-edit')->withListing($listing);
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
            'visibility' => 'required',
        ));

        $listing = Listing::find($id);

        $listing->title = $request->title;
        $listing->visibility = $request->visibility;
        $listing->save();

        alert()->success('Listo!', 'La lista fue editada');
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
        $listing = Listing::find($id);
        $listing->games()->detach();
        $listing->delete();
        alert()->info('Atención!', 'La lista fue eliminada');
        return redirect('listings');
    }

    public function deleteGameFromListing($gameId, $listingId)
    {
        $listing = Listing::find($listingId);
        $listing->games()->detach(Game::find($gameId));
        alert()->info('Atención!', 'El juego fue eliminado de la lista');
        return redirect('listings');
    }
}
