<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trabajador;
use App\Provincia;
use App\Categoria;
use App\Experiencia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(Request $request)
    {

        if ($request->user()->rol_id===1){


         //   $trabajador=Trabajador::where('user_id', $request->user()->user_id)->first();
            $trabajador=Trabajador::where('user_id', $request->user()->user_id)->count();
            $provincias=Provincia::all();
            $categorias=Categoria::all();

      /*      if ($trabajador==null) {
                return View('cv', ['datos' => $request->user(), 'provincias' => $provincias, 'categorias'=>$categorias ]);
            } else {
                return view('home', ['datos' => $trabajador]);
            }*/
                return view('home', ['trabajador'=>$trabajador,'datos' => $request->user(), 'provincias' => $provincias, 'categorias'=>$categorias ]);


        } elseif ($request->user()->rol_id===2) {
        return view('home2');
        }else {
            return view('home2');
        }

        
    }



}
