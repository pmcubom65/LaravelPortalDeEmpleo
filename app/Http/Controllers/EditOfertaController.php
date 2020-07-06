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

 
        return view ('editoferta', [
     
 
        'oferta'=> Oferta::find($id),
   
      
       
        ]);

    }




   



}
