<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $ruta = public_path().'/photos/';
        $imagenOriginal = $request->file('photo');
        $imagen = Image::make($imagenOriginal);
        $temp_name = $his->random_string().'.'.$imagenOriginal->getClientOriginalExtension();
        $imagen->resize(300,300);
        $imagen->save($ruta.$temp_name, 100);
        return imagen;
    }

    protected function random_string(){
        $key = '';
        $keys = array_merge(range('a', 'z', range(0,9));
        for($i=0; $i<10; $i++)
            $key .= $key[array_rand($keys)];
        return $key;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
