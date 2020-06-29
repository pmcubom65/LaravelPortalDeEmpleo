<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Empresa;
use App\User;
use App\Categoria;
use App\Oferta;
use App\Trabajador;
use App\Contacto;
use Carbon\Carbon;


class EntrevistaController extends Controller
{
    public function show($id) {

        $lasprovincias=Provincia::all();
  
        $laentrevista=Contacto::find($id);
        $lasempresas=Empresa::all();
    //    $laempresa=User::find($id);
    //    $estaempresa=Empresa::where('user_id', $id)->count();
    //    $ofertae=Oferta::find($oid);
    //    $trabajador=Trabajador::find($tid);
    //    $empresaseleccionada=Empresa::where('user_id', '=', $id)->first();
    return view ('entrevista',[
        'provincias'=> $lasprovincias,
 
        'entrevista'=>$laentrevista
        
        ]);

       
    }
}
