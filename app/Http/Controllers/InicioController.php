<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Explaboral;
use App\Contrato;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecibidoMail;
use App\Mail\ConfirmacionMail;



class InicioController extends Controller
{
  

    public function index() {

   
  

    return view('welcome');
    
    }



    public function mail(Request $request) {

        $messages = [
            'required'=>'Todos los campos son obligatorios'
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
            Mail::to($request->get('emailid'))->send(new RecibidoMail());
            Mail::to('admin@admin.com')->send(new ConfirmacionMail($request->get('emailid'), $request->get('asuntoid'), $request->get('mssgid')));
            $Response=['success'=>'Ha sido enviado correctamente'];
        }


        return response()->json($Response,200);
    }
}
