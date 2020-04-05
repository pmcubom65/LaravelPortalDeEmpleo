<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Empresa;
use App\User;
use App\Categoria;


class EmpresaController extends Controller
{
    public function show($id) {

        $lasprovincias=Provincia::all();
        $laempresa=User::find($id);
        $lascategorias=Categoria::all();
        $lasempresas=Empresa::all();
        
        return view ('miempresa', ['provincias'=> $lasprovincias,
        'datos'=>$laempresa, 
        'categorias'=>$lascategorias,
        'empresas'=>$lasempresas
        ]);

    }

    public function store($id, Request $request) {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }
}
