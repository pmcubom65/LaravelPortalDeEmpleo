<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Provincia;
use App\Empresa;
use App\User;
use App\Categoria;
use App\Oferta;
use App\Trabajador;
use App\Contacto;
use Carbon\Carbon;


class OfertatrabajadorController extends Controller
{
    public function show($id, $oid, $tid){

        $trabajador=Trabajador::where('id', $tid)->first();


        return view ('datostrabajadorparaempresa',[
            'trabajador' =>  $trabajador,
            'usuario'=> User::where('id', '=', $trabajador->user_id)->first()
        ]);




    }
}
