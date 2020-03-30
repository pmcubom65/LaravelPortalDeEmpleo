<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Trabajador;
use App\Provincia;
use App\Categoria;
use App\Experiencia;

class ExperienciaController extends Controller
{
    public function store(Request $request)
    {
        $miexperiencia=new Experiencia();
        $miexperiencia->puesto=$request->input('tituloexp');
        $miexperiencia->empresa=$request->input('empresaexp');
        $miexperiencia->inicio=$request->input('inicioexp');
        $miexperiencia->fin=$request->input('finexp');
        $miexperiencia->categoria_id=$request->input('cat');
        $miexperiencia->descripcion=$request->input('desexp');

        $miexperiencia->save();

        return view('/ejemplo');

    }
}
