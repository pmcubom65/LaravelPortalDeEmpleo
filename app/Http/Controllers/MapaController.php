<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MapaController extends Controller
{
    protected $request;

public function show() {
   
    return view ('elmapa');
}
}
