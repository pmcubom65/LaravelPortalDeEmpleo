<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Empresa;
use App\User;
use App\Categoria;
use App\Oferta;
use App\Trabajador;

class CandidatosController extends Controller
{
    public function index($id, $ofertaid) {
        $lasprovincias=Provincia::all();
        $lascategorias=Categoria::all();
        $lasempresas=Empresa::all();
        $laempresa=User::find($id);
        $empresaseleccionada=Empresa::where('user_id', '=', $id)->first()->id;
        $lasofertas=Oferta::where('empresa_id', '=', $empresaseleccionada)->get();
       
        $estaempresa=Empresa::where('user_id', $id)->count();

        $trabajadoresapuntados=Oferta::find($ofertaid)->trabajadors()->orderby('created_at')->get();
        
        
     return view ('mostrarloscandidatos', [
        'provincias'=> $lasprovincias,
        'datos'=>$laempresa, 
        'categorias'=>$lascategorias,
        'empresas'=>$lasempresas,
        'ofertas'=>$lasofertas,
        'contador'=>$estaempresa,
        'trabajadores'=>$trabajadoresapuntados
   
        ]);

      
   

    }
}