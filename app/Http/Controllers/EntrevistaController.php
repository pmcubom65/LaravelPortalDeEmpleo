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
use App\Mail\EntrevistaMail;
use Illuminate\Support\Facades\Mail;



class EntrevistaController extends Controller
{
    protected $request;

public function show(Request $request, $id, $oid, $tid) {

 
   
    return view ('entrevistaempresa',[
     
    
        'trabajador'=>Trabajador::find($tid)->id,
    
        'oferta'=>Oferta::find($oid)->id,
        'empresa'=>Empresa::where('user_id', '=', $id)->first()
   
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
        $ofertae=Oferta::find($oid);
   
      //  $pivotid= $ofertae->trabajadors()->find($tid)->pivot->id;


      $pivotid=DB::table('oferta_trabajador')->where([
        ['oferta_id', '=', $oid],
        ['trabajador_id', '=', $tid],
        ])->first()->id;




        $contactoeditar=Contacto::where('oferta_trabajador_id', '=', $pivotid)->first();

    if ($Validator->fails()) {

        $Response=$Validator->messages();

    }else if($contactoeditar) {
        $contacto=$contactoeditar;

        $contacto->dia= Carbon::parse($request->get('dater'))->format('Y-m-d');
       
        $contacto->hora=Carbon::parse($request->get('horar'))->format('H:i');

        $contacto->latitud=$request->get('latr');
        $contacto->longitud=$request->get('longr');
        $contacto->direccion=$request->get('direccionr');
        
        $contacto->save();

        $trabajodormail=Trabajador::find($tid)->hasUser->email;
        
        Mail::to($trabajodormail)->send(new EntrevistaMail());
        $Response=['success'=>'El contacto ha sido editado. El candidato ha sido contactado'];

    }
    
    
    else {
        $contacto=new Contacto();



        $contacto->oferta_trabajador_id=$pivotid;

        $contacto->dia= Carbon::parse($request->get('dater'))->format('Y-m-d');
       
        $contacto->hora=Carbon::parse($request->get('horar'))->format('H:i');

        $contacto->latitud=$request->get('latr');
        $contacto->longitud=$request->get('longr');
        $contacto->direccion=$request->get('direccionr');
        
        $contacto->save();

        $trabajodormail=Trabajador::find($tid)->hasUser->email;
        
        Mail::to($trabajodormail)->send(new EntrevistaMail());
        $Response=['success'=>'El candidato ha sido contactado'];
    }

    return response()->json($Response, 200);

}
}