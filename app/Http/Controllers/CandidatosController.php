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
      
        
        return view ('mostrarloscandidatos', [
            'oferta'=>Oferta::find($ofertaid),
            'provincias'=> Provincia::all(),
           
      
            'trabajadores'=>Oferta::find($ofertaid)->trabajadors()->orderby('created_at')->get()
       
            ]);
      
   

    }


    public function fetch_data($id, $ofertaid, $trabajadorid){

	
	
        $ofertae=Oferta::find($ofertaid);

        $trabajadoresapuntados=Oferta::find($ofertaid)->trabajadors()->orderby('created_at')->find($trabajadorid);
   
        
        $laexpes= $trabajadoresapuntados->user->explaborales->sortByDesc('fin')->paginate( 3 );


      return response()->json([
            'experiencias' => $laexpes,
            'pagination'=>(string) $laexpes->links()
        ]);
   
           
                
         }
        
    

    public function store($id, $ofertaid, Request $request) {

        $ofertae=Oferta::find($ofertaid);
        $trabajadorid=$request->get('trabajador_id');

        $seleccion=$request->get('seleccion');
       
        $resultado=$ofertae->trabajadors()->updateExistingPivot($trabajadorid, ['seleccionado'=>$seleccion]);

        

        $Response=['success'=> $resultado];
        
    
        return response()->json($Response, 200);

    }



}