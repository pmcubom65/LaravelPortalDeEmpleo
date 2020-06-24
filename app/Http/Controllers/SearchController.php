<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Oferta;
use App\Provincia;
use App\Empresa;
use App\User;
use App\Categoria;
use App\Explaboral;
use App\Contrato;
use App\Oferta_trabajador;
use App\Trabajador;


class SearchController extends Controller
{
    public function index(Request $request) {

       
        if ($request->has('Provincia')) {

            $miArray['provincia_id'] = $request->get('Provincia');

        }
        if ($request->has('Experiencia')){

            $miArray['experiencia_id'] = $request->get('Experiencia');

        }
        if ($request->has('Salarioid')){

            $miArray['salario'] = $request->get('Salarioid');

        }
        if ($request->has('cat')){

            $miArray['categoria_id'] = $request->get('cat');

        }
         if ($request->has('contrato')){

            $miArray['contrato_id'] = $request->get('contrato');

        }
        unset( $miArray['salario']);
        $miArray['proceso']=1;
      
        foreach ($miArray as $clave=>$valor) {
            if(is_null($miArray[$clave])){
                unset( $miArray[$clave]); 
            }
        }

        $misresultados =  Oferta::where('salario','>=',$request->get('Salarioid'))->where($miArray)->get();
  

     $lasprovincias=Provincia::all();
  
 
     $laempresa=User::find(Auth::id());

    
     return view ('resultadosbusquedaoferta', [
        'provincias'=> $lasprovincias,
      

        'resultados'=>$misresultados,
        'datos'=>$laempresa
       
        ]);



    }


    public function store(Request $request, $id) {
        $trabajador=Trabajador::where('user_id', Auth::id())->first();
        
        if (!Auth::check()) {
            $Response=['success'=>'Necesitas hacer login para inscribirte'];
        }
        else if ( Auth::user()->rol_id===1 && $trabajador) {
                
           
                $inscripcion= new Oferta_trabajador();
                $inscripcion->oferta_id=$id;
                $inscripcion->trabajador_id=$trabajador->id;
                $inscripcion->seleccionado=0;
                $inscripcion->save();

               $Response=['success'=>'Has sido inscrito en la oferta'];
        }else {
            $Response=['success'=>'Necesitas tener el perfil de trabajador completo para inscribirte'];
        }
        return response()->json($Response,200);
    }


    public function put($id) {
        $laoferta=Oferta::find($id);
        $laoferta->proceso=0;
        $laoferta->save();

        $lasprovincias=Provincia::all();

        $mioferta=Oferta::find($id);
        $elusuario=User::find(Auth::id());

        return view ('veroferta', [
            'provincias'=> $lasprovincias,
            'datos'=> $elusuario,
    
            'oferta'=>$mioferta
          
           
            ]);
    }



    public function oferta($id) {



        $lasprovincias=Provincia::all();
     
        $mioferta=Oferta::find($id);
        $elusuario=User::find(Auth::id());
      
     

   
        return view ('veroferta', [
        'provincias'=> $lasprovincias,
        'datos'=> $elusuario,
    
        'oferta'=>$mioferta
      
       
        ]);



        

    }



}