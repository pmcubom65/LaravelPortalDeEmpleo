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
     
        $estaempresa=Empresa::where('user_id', $id)->count();

        $ofertae=Oferta::find($ofertaid);

        $trabajadoresapuntados=Oferta::find($ofertaid)->trabajadors()->orderby('created_at')->get();
        
        return view ('mostrarloscandidatos', [
            'laoferta'=>$ofertae,
            'provincias'=> $lasprovincias,
            'datos'=>$laempresa, 
            'categorias'=>$lascategorias,
            'empresas'=>$lasempresas,
           
            'contador'=>$estaempresa,
            'trabajadores'=>$trabajadoresapuntados
       
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

        $trabajadorid=$request->get('seleccionado');
       

        $ofertae->trabajadors()->updateExistingPivot($trabajadorid, ['seleccionado'=>1]);

        $Response=['success'=> $trabajadorid];
        
    
        return response()->json($Response, 200);

    }


    public function put($id, $ofertaid, Request $request) {
        $ofertae=Oferta::find($ofertaid);

        $trabajadorid=$request->get('descartado');

        $ofertae->trabajadors()->updateExistingPivot($trabajadorid, ['seleccionado'=>0]);

        $Response=['success'=>$trabajadorid];
    
        return response()->json($Response, 200);
    }
}