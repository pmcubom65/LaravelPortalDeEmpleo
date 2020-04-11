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
      

        $misresultados =  Oferta::where('salario','>=',$request->get('Salarioid'))->where($miArray)->get();


     //   return $misresultados;

     $lasprovincias=Provincia::all();
     $lascategorias=Categoria::all();
     $lasempresas=Empresa::all();
     $laempresa=User::find(Auth::id());

     return view ('resultadosbusquedaoferta', [
        'provincias'=> $lasprovincias,
      
        'categorias'=>$lascategorias,
        'empresas'=>$lasempresas,
        'resultados'=>$misresultados,
        'datos'=>$laempresa
       
        ]);




    }


    public function store(Request $request, $id) {
        
        if (Auth::user()->rol_id===1) {
                
                $trabajador=Trabajador::where('user_id', Auth::id())->first();
                $inscripcion= new Oferta_trabajador();
                $inscripcion->oferta_id=$id;
                $inscripcion->trabajador_id=$trabajador->id;

                $inscripcion->save();

               $Response=['success'=>'Has sido inscrito en la oferta'];
        }else {
            $Response=['success'=>'Necesitas estar logueado como trabajador para inscribirte'];
        }
        return response()->json($Response,200);
    }



    public function oferta($id) {



        $lasprovincias=Provincia::all();
        $lascategorias=Categoria::all();
        $lasempresas=Empresa::all();
        $mioferta=Oferta::find($id);
        $elusuario=User::find(Auth::id());
      
     

   
        return view ('veroferta', [
        'provincias'=> $lasprovincias,
        'datos'=> $elusuario,
        'categorias'=>$lascategorias,
        'empresas'=>$lasempresas,
        'oferta'=>$mioferta
      
       
        ]);



        

    }
}