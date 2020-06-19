<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Provincia;
use App\Empresa;
use App\User;
use App\Categoria;
use Validator;



class EmpresaController extends Controller
{
    public function show($id) {

        $lasprovincias=Provincia::all();
        $laempresa=User::find($id);

        $estaempresa=Empresa::where('user_id', $id)->count();
        
        $datosaempresa=Empresa::where('user_id', Auth::id())->first();
        
        return view ('miempresa', ['provincias'=> $lasprovincias,
        'datos'=>$laempresa, 

        'contador'=>$estaempresa,
        'datosemp'=>$datosaempresa
        ]);

    }

    public function store($id, Request $request) {
        $messages = [
            'required'=>'No se puede dejar ningún campo en blanco',
            'integer'=>'El número de empleados tiene que ser un numero',
            'numeric'=>'Latitud entre -90 y 90, longitud entre -180 y 180',
            'string'=>'Tiene que rellenar los campos con un string excepto número de empleados'
     
        ];
        $Validator=Validator::make(
            $request->all(),
            [
                'nombrer' => 'required|string',
                'apellidos' => 'required|string',
                'direccion' => 'required|string',
                'cif' => 'required|string',
                'num' => 'required|integer',
                
                'Provincia' => 'required',
                'telefono' => 'required|string',
                'latitud' => "required|numeric|between:-90,90",
                'longitud'=> "required|numeric|between:-180,180"
            ],

                $messages

        );
        if ($Validator->fails()) {
            $Response=$Validator->messages();
        }else {
            $siempresa=Empresa::where('user_id', Auth::id())->count();

            if ($siempresa===0) {

            $e=new Empresa();
            $e->user_id=Auth::id();
            $e->cif=$request->get('cif');
            $e->domicilio=$request->get('direccion');
           
            $e->nombre=$request->get('nombrer');
            $e->apellidos=$request->get('apellidos');
            $e->numero_empleados=$request->get('num');
            $e->provincia_id=$request->get('Provincia');
            $e->telefono=$request->get('telefono');
            $e->latitud=$request->get('latitud');
            $e->longitud=$request->get('longitud');
            $e->save();

            } else {
                $emp=Empresa::where('user_id', Auth::id())->first();
                $emp->cif=$request->get('cif');
                $emp->domicilio=$request->get('direccion');
               
                $emp->nombre=$request->get('nombrer');
                $emp->apellidos=$request->get('apellidos');
                $emp->numero_empleados=$request->get('num');
                $emp->provincia_id=$request->get('Provincia');
                $emp->telefono=$request->get('telefono');
                $emp->latitud=$request->get('latitud');
                $emp->longitud=$request->get('longitud');
                $emp->save();

            }

            $Response=['success'=>'Datos actualizados'];
        }
      
            return response()->json($Response, 200);
    }
}
