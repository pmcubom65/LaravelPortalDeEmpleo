<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Provincia;
use App\Empresa;
use App\User;
use App\Categoria;
use App\Oferta;
use App\Trabajador;
use App\Contacto;
use Carbon\Carbon;


class MapaController extends Controller
{
    protected $request;

public function show(Request $request, $id, $oid, $tid) {

    $lasprovincias=Provincia::all();
    $lascategorias=Categoria::all();
    $lasempresas=Empresa::all();
    $laempresa=User::find($id);
    $estaempresa=Empresa::where('user_id', $id)->count();
    $ofertae=Oferta::find($oid);
    $trabajador=Trabajador::find($tid);
    $empresaseleccionada=Empresa::where('user_id', '=', $id)->first();
   
    return view ('elmapa',[
        'provincias'=> $lasprovincias,
        'datos'=>$laempresa, 
        'categorias'=>$lascategorias,
        'empresas'=>$lasempresas,
        'eltrabajador'=>$trabajador,
        'contador'=>$estaempresa,
        'laoferta'=>$ofertae,
        'datosempresa'=>$empresaseleccionada
   
        ]);
}


public function store(Request $request, $id, $oid, $tid) {

    $messages = [
            'required'=> 'Los campos fecha y hora tienen que estar rellenados. La fecha tiene que ser posterior a hoy',
           
    ];

    $Validator=Validator::make(
        $request->all(),
        [
            'dater'=> 'required|date|after:today',
            'horar'=>'required',
            'direccionr'=>'required',
            'latr'=>'required|between:-90,90',
            'longr'=>'required|between:-180,180'
        ],
        $messages

    );

    if ($Validator->fails()) {

        $Response=$Validator->messages();
    } else {
        $contacto=new Contacto();

        $ofertae=Oferta::find($oid);
       

        $pivotid= $ofertae->trabajadors()->find($tid)->pivot->id;

        $contacto->oferta_trabajador_id=$pivotid;

        $contacto->dia= Carbon::parse($request->get('dater'))->format('Y-m-d');
       
        $contacto->hora=Carbon::parse($request->get('horar'))->format('H:i');

        $contacto->latitud=$request->get('latr');
        $contacto->longitud=$request->get('longr');
        $contacto->direccion=$request->get('direccionr');
        
        $contacto->save();
        $Response=['success'=>'El candidato ha sido contactado'];
    }

    return response()->json($Response, 200);

}
}