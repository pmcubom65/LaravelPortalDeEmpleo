<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Empresa;
use App\User;

use App\Oferta;
use Illuminate\Support\Facades\Auth;

class PublicadaController extends Controller
{
    public function index($id){

        $empresaseleccionada=Empresa::where('user_id', '=', Auth::id())->first()->id;
   
        return view ('gestionaroferta', [
      

        'ofertas'=>Oferta::where('empresa_id', '=', $empresaseleccionada)->get()
      
   
        ]);


    }
}
