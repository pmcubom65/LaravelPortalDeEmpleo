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

class OfertaController extends Controller
{
    public function index($id) {
        $lasprovincias=Provincia::all();
        $lascategorias=Categoria::all();
        $lasempresas=Empresa::all();
        $laempresa=User::find($id);
        $lasexperienciaslaborales=Explaboral::all();
        $loscontratos=Contrato::all();


   
        return view ('publicaroferta', [
        'provincias'=> $lasprovincias,
        'datos'=>$laempresa, 
        'categorias'=>$lascategorias,
        'empresas'=>$lasempresas,
        'experiencias'=>$lasexperienciaslaborales,
        'contratos'=>$loscontratos
       
        ]);
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


        if($Validator->fails()) {
            $Response=$Validator->messages();
        } else {
            $micategoria=new Categoria();
            $micategoria->nombre=$request->get('catname');
            $micategoria->descripcion=$request->get('desccat');
            $micategoria->save();
            $creada=Categoria::where('nombre', $request->get('catname'))->first();
            $Response=['success'=>['mssg'=>'La categoria ha sido creada y se encuentra habilitada', 'elid'=>$creada->id, 'elname'=>$creada->nombre]];
        }


        return response()->json($Response,200);
    }
}






