<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Provincia;
use App\Empresa;
use App\User;
use App\Categoria;

class OfertaController extends Controller
{
    public function index($id) {
        $lasprovincias=Provincia::all();
        $lascategorias=Categoria::all();
        $lasempresas=Empresa::all();
        $laempresa=User::find($id);

   
        return view ('publicaroferta', [
        'provincias'=> $lasprovincias,
        'datos'=>$laempresa, 
        'categorias'=>$lascategorias,
        'empresas'=>$lasempresas,
       
        ]);
    }
}






