<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Oferta;

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
      

        $resultados =  Oferta::where('salario','>',$request->get('Salarioid'))->where($miArray)->get();


        return $resultados;
    }
}