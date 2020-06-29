<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfertatrabajadorController extends Controller
{
    public function show($id, $oid, $tid){


        return view ('datostrabajadorparaempresa');




    }
}
