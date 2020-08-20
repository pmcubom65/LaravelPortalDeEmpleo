<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Empresa;
use App\User;
use App\Categoria;
use App\Oferta;
use App\Trabajador;
use App\Oferta_trabajador;
use DB;

class CandidatosController extends Controller
{
    public function index($id, $ofertaid) {
      

        return view ('mostrarloscandidatos', [
            'oferta'=>Oferta::find($ofertaid),

            ]);
      
   

    }

        
    

    public function store($id, $ofertaid, Request $request) {

        $ofertae=Oferta::find($ofertaid);
        $trabajadorid=$request->get('trabajador_id');

        $seleccion=$request->get('seleccion');
       
   //     $resultado=$ofertae->trabajadors()->updateExistingPivot($trabajadorid, ['seleccionado'=>$seleccion]);

        $oferta_trabajador=DB::table('oferta_trabajador')->where([
            ['oferta_id', '=', $ofertaid],
            ['trabajador_id', '=', $trabajadorid],
        ])->update(['seleccionado' =>  $seleccion]);

        

        $Response=['success'=> $resultado];
        
    
        return response()->json($Response, 200);

    }



}