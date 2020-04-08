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


class SearchController extends Controller
{
    public function index(Request $request) {

       
        if ($request->has('Provincia')) {

            $miArray['provincia_id'] = $request->get('Provincia');

        }else if ($request->has('Experiencia')){

            $miArray['experiencia_id'] = $request->get('Experiencia');

        }else if ($request->has('Salarioid')){

            $miArray['salario'] = $request->get('Salarioid');

        }else if ($request->has('cat')){

            $miArray['categoria_id'] = $request->get('cat');

        }else if ($request->has('contrato')){

            $miArray['contrato_id'] = $request->get('contrato');

        }
        unset( $miArray['salario']);
      

        $misresultados =  Oferta::where('salario','>',$request->get('Salarioid'))->where($miArray)->get();


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
}