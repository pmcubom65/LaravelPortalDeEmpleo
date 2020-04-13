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

class EditOfertaController extends Controller
{
    public function show($id) {

        
        $lasprovincias=Provincia::all();
        $lascategorias=Categoria::all();
        $lasempresas=Empresa::all();
        $mioferta=Oferta::find($id);
        $elusuario=User::find(Auth::id());
        $lasexperiencias=Explaboral::all();
        $loscontratos=Contrato::all();
      
     

   
        return view ('editoferta', [
        'provincias'=> $lasprovincias,
        'datos'=> $elusuario,
        'categorias'=>$lascategorias,
        'empresas'=>$lasempresas,
        'oferta'=>$mioferta,
        'experiencias'=>$lasexperiencias,
        'contratos'=>$loscontratos
      
       
        ]);

    }




    public function store(Request $request, $id) {
        $messages= [
            'required'=>'Todos los campos tienen que rellenarse',
            'integer'=>'Campo número entero'
        ];

        $Validator=Validator::make(
            $request->all(),
            ['titulo' => 'required',
            'Provincia'=> 'required|integer',
            'Experiencia'=> 'required|integer',
            'Salarioid' => 'required|integer',
            'contrato'=> 'required|integer',
            'oferta'=> 'required',
            'cat' => 'required|integer'],

            $messages

        );

        if($Validator->fails()) {
            $Response=$Validator->messages();
        } else {

            $mioferta=Oferta::find($id);
            $mioferta->categoria_id=$request->get('cat');
            $mioferta->contrato_id=$request->get('contrato');
            $mioferta->descripcion=$request->get('oferta');
            $mioferta->experiencia_id=$request->get('Experiencia');
            $mioferta->provincia_id=$request->get('Provincia');
            $mioferta->salario=$request->get('Salarioid');
            $mioferta->titulo=$request->get('titulo');
            $mioferta->save();
            $Response=['success'=>'La oferta ha sido editada exitosamente'];
        }


        return response()->json($Response,200);

    }



}
