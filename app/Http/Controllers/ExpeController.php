<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experiencia;
use App\Categoria;
use App\Empresa;

class ExpeController extends Controller
{
    public function show($id) {

        $laexperiencia=Experiencia::find($id);
        
      
       

        return view('expe', ['miexpe'=>$laexperiencia, 'midisplay'=>'none']);


    }

    public function delete(Request $request,$id) {
        $laexperiencia=Experiencia::find($id);
       
                
        $laexperiencia->delete();
       
        return back()->withInput(['miexpe'=>$laexperiencia]);
    }


    public function store(Request $request, $id) {
        $laexperiencia=Experiencia::find($id);
     
        $laexperiencia->categoria_id=$request->get('cat');
        $laexperiencia->descripcion=$request->get('desexp');
        $laexperiencia->empresa=$request->get('empresaexp');
        $laexperiencia->inicio=$request->get('inicioexp');
        $laexperiencia->fin=$request->get('finexp');
        $laexperiencia->puesto=$request->get('tituloexp');
        $laexperiencia->save();
        

        return view('expe', ['miexpe'=>$laexperiencia, 'midisplay'=>'block']);
    }
}
