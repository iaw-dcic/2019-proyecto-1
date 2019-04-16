<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ingresarController extends Controller
{
    public function ingresar() {
        return view('ingresar');
    }

    public function registrar() {
        return view('crearCuenta');
    }

    public function condiciones() {
        return view('condiciones');
    }
}
