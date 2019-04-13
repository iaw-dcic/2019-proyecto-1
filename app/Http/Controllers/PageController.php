<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function inicio()
    {
        $listaDeBienes = ['bien1', 'bien2'];
        return view('index', compact('listaDeBienes'));
    }

    public function ingreso()
    {
        return "Pagina ingreso";
    }

    public function registro()
    {
        return "Pagina registro";
    }
}
