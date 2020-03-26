<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trabajador;

class TrabajadorController extends Controller
{
    public function show() {
        $trabajador=Trabajador::where('user_id', $id)->firstOrFail();

        return view('home', ['datos' => $trabajador]);

    }
}
