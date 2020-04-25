<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Explaboral;
use App\Contrato;
use Validator;


class InicioController extends Controller
{
  

    public function index() {
  

    return view('welcome');
    
    }



    public function mail(Request $request) {

        $messages = [
            'required'=>'campo obligatorio'
        ];

        $Validator=Validator::make(
            $request->all(),
            [
                'emailid'=>'required',
                'asuntoid'=>'required',
                'mssgid'=>'required'
            ],
            $messages
        );

        if ($Validator->fails()) {
            $Response=$Validator->messages();
        } else {
            $Response=['success'=>'Ha sido enviado correctamente'];
        }


        return response()->json($Response,200);
    }
}
