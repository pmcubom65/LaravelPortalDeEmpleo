<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Explaboral;
use App\Contrato;


class InicioController extends Controller
{
  

    public function index() {
  

    return view('welcome');
    
    }
}
