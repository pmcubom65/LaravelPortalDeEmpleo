<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Empresa;

use App\Provincia;
use App\Explaboral;
use App\Contrato;


class InicioController extends Controller
{
    public function index() {
    $categorias=Categoria::all();
    $tempresas=Empresa::all();
   
    $lasprovincias=Provincia::all();
    $lasexpes=Explaboral::all();
    $loscontratos=Contrato::all();

    return view('welcome', [
        'categorias'=>$categorias,
        'empresas'=>$tempresas,
        'provincias'=>$lasprovincias,
        'experiencias'=>$lasexpes,
        'contratos'=>$loscontratos
        
        
        ]);
    }
}
