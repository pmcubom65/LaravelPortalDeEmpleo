<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Provincia;
use App\Empresa;
use App\User;
use App\Categoria;
use App\Explaboral;
use App\Contrato;
use App\Oferta;
use App\Oferta_trabajador;
use DB;


class OfertaController extends Controller
{


    public function put($id, Request $request) {


        $messages= [
            'required'=>'Se tienen que rellenar todos los campos',
            'numeric'=>'El salario tiene que ser un número ',
            'min'=>'El salario tiene que ser como mínimo 12000 '
        ];


        $Validator=Validator::make(
            $request->all(),
            [
                'titulo' => 'required',
                'Provincia'=>'required',
                'Experiencia'=>'required',
                'Salarioid'=>'required|numeric|min:12000',
                'contrato'=>'required',
                'ofertad'=>'required',
                'cat'=>'required'
            ],

                $messages

        );
        $oferta=Oferta::find($request->get('oferta'));

        $empresaid=Empresa::where('user_id', Auth::id())->first()->id;

        if ($Validator->fails()) {
            $Response=$Validator->messages();
        } else if(!$oferta) {

            $laoferta=new Oferta();
            $laoferta->categoria_id=$request->get('cat');
            $laoferta->contrato_id=$request->get('contrato');
            $laoferta->descripcion=$request->get('ofertad');
            $laoferta->empresa_id=$empresaid;
            $laoferta->experiencia_id=$request->get('Experiencia');
            $laoferta->provincia_id=$request->get('Provincia');
            $laoferta->salario=$request->get('Salarioid');
            $laoferta->titulo=$request->get('titulo');
            $laoferta->proceso=1;
        
            $laoferta->save();

          


            $inscripcion= new Oferta_trabajador();
            $inscripcion->oferta_id=Oferta::where('empresa_id', $empresaid)->latest()->first()->id;
            $inscripcion->trabajador_id=1;
      
            $inscripcion->save();

            $inscripcion2= new Oferta_trabajador();
            $inscripcion2->oferta_id=Oferta::where('empresa_id', $empresaid)->latest()->first()->id;
            $inscripcion2->trabajador_id=2;
      
            $inscripcion2->save();
    

            $Response=['success'=>'La oferta ha sido publicada. Vaya a Revisar ofertas publicadas para gestionarla'];
            
        } else {
            $laoferta=Oferta::find($request->get('oferta'));
            $laoferta->categoria_id=$request->get('cat');
            $laoferta->contrato_id=$request->get('contrato');
            $laoferta->descripcion=$request->get('ofertad');
            $laoferta->empresa_id=Empresa::where('user_id', Auth::id())->first()->id;
            $laoferta->experiencia_id=$request->get('Experiencia');
            $laoferta->provincia_id=$request->get('Provincia');
            $laoferta->salario=$request->get('Salarioid');
            $laoferta->titulo=$request->get('titulo');
        
            $laoferta->save();
            $Response=['success'=>'La oferta ha sido editada con éxito'];
            
        }

        return response()->json($Response,200);
    }




    public function index($id) {
        
       


   
        return view ('publicaroferta');
    }



    public function store(Request $request, $id) {
        
        $messages= ['required'=>'Todos los campos se tienen que rellenar'];


        $Validator=Validator::make(
            $request->all(),
            [
                'catname'=>'required',
                'desccat'=>'required'
            ],
            $messages
        );
        $creada=Categoria::where('nombre', $request->get('catname'))->first();

        if($Validator->fails()) {
            $Response=$Validator->messages();
        } else if($creada) {
            $Response=['success'=>['mssg'=>'El nombre de categoria indicado ya existe. Categoria no guardada', 'elid'=>$creada->id, 'elname'=>$creada->nombre]];
        }  else {
            $micategoria=new Categoria();
            $micategoria->nombre=$request->get('catname');
            $micategoria->descripcion=$request->get('desccat');
            $micategoria->save();
            $creada=Categoria::where('nombre', $request->get('catname'))->first();
            $Response=['success'=>['mssg'=>'La categoria ha sido creada y ya se encuentra disponible', 'elid'=>$creada->id, 'elname'=>$creada->nombre]];
        }
        
        
      


        return response()->json($Response,200);
    }
}