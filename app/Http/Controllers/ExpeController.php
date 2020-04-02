<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experiencia;
use App\Categoria;

class ExpeController extends Controller
{
    public function show($id) {

        $laexperiencia=Experiencia::find($id);
        $miscategorias=Categoria::all();

        return view('expe', ['miexpe'=>$laexperiencia, 'categorias'=>$miscategorias]);


    }
}
