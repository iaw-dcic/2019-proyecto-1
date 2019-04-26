<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use Auth;

class ListingsController extends Controller
{


    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','create']]);
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
            alert()->info('Atencion!', 'Tenes que iniciar sesión o registrarte para ver tus listas.');
            //return view('listings.index'); //Poner logica en listings.index parecida a games.blade para ponerle un buscador de listas
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

    public function getUserListings($userName)
    {
            $user = User::where('name', $userName)->first();
            $userListings = Listing::where('user_id', $user->id)->get();

            $data = [
                'listings'   => $userListings,
                'listOwnerName'  => $user->name,
            ];

            return view('pages.profile')->with('data', $data);
    }

}
