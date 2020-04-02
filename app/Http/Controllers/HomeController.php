<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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

     
        if (Auth::user()->rol_id===1){

        
            $trabajador=Trabajador::where('user_id', Auth::id())->count();
            $trabajadorlog=Trabajador::where('user_id', Auth::id())->first();

            $provincias=Provincia::all();
            $categorias=Categoria::all();
            $lasexperiencias=Experiencia::where('user_id', Auth::id())->orderBy('fin')->get();
      
                return view('home', ['trabajador'=>$trabajador,
                'curriculum'=>$trabajadorlog,
                'experienciass'=>$lasexperiencias,
                'datos' => $request->user(), 
                'provincias' => $provincias,
                 'categorias'=>$categorias ]);


        } elseif (Auth::user()->rol_id===2) {
        return view('home2');
        }else {
            return view('home2');
        }

        
    }

    public function store(Request $request)
    {
        $provincias=Provincia::all();
        $categorias=Categoria::all();

        if (Trabajador::where('user_id', Auth::id())->count()==0) {

        $validatedData = $request->validate([
            'tituloexp' => 'required',
            'empresaexp' => 'required',
            'inicioexp' => 'required',
            'finexp' => 'required',
            'cat' => 'required',
            'desexp' => 'required',
            'userid' => 'required',

            'direcciones' => 'required',
            'dnis' => 'required',
            'fechas' => 'required',
            'provincias' => 'required',
            'telefonos' => 'required',
        ]);
        $miexperiencia=new Experiencia();
        $miexperiencia->puesto=$request->input('tituloexp');
        $miexperiencia->empresa=$request->input('empresaexp');
        $miexperiencia->inicio=$request->input('inicioexp');
        $miexperiencia->fin=$request->input('finexp');
        $miexperiencia->categoria_id=$request->input('cat');
        $miexperiencia->descripcion=$request->input('desexp');
        $miexperiencia->user_id=$request->input('userid');

        $miexperiencia->save();
        $usuario=User::find($request->input('userid'));
  
        $mitrabajador=new Trabajador();
        $mitrabajador->direccion=$request->input('direcciones');
        $mitrabajador->dni=$request->input('dnis');
        $mitrabajador->fecha=$request->input('fechas');
        $mitrabajador->provincia_id=$request->input('provincias');
        $mitrabajador->telefono=$request->input('telefonos');
        $mitrabajador->user_id=$request->input('userid');
        $mitrabajador->save();
        $eltrabajador=Trabajador::where('user_id', Auth::id())->first();

        $lasexperiencias=Experiencia::where('user_id', Auth::id())->get();
        
        
       return view('/home', ['trabajador'=>1,
                            'curriculum'=>$eltrabajador, 
                            'datos' =>$usuario, 
                            'provincias' => $provincias, 
                            'categorias'=>$categorias 
                            ]);

        } else {
            $validatedData = $request->validate([
                'tituloexp' => 'required',
                'empresaexp' => 'required',
                'inicioexp' => 'required',
                'finexp' => 'required',
                'cat' => 'required',
                'desexp' => 'required',
                'userid' => 'required',
 
            ]);

            $copia=Trabajador::where('user_id', Auth::id())->first();
            $miexperiencia=new Experiencia();
            $miexperiencia->puesto=$request->input('tituloexp');
            $miexperiencia->empresa=$request->input('empresaexp');
            $miexperiencia->inicio=$request->input('inicioexp');
            $miexperiencia->fin=$request->input('finexp');
            $miexperiencia->categoria_id=$request->input('cat');
            $miexperiencia->descripcion=$request->input('desexp');
            $miexperiencia->user_id=Auth::id();
    
            $miexperiencia->save();
            $usuario=User::find($request->input('userid'));

            $eltrabajador=Trabajador::where('user_id', Auth::id())->first();

            $lasexperiencias=Experiencia::where('user_id', Auth::id())->get();
        
        
       return view('/home', ['trabajador'=>1,
                            'curriculum'=>$eltrabajador, 
                            'experienciass'=>$lasexperiencias,
                            'datos' =>$usuario, 
                            'provincias' => $provincias, 
                            'categorias'=>$categorias 
                            ]);





        }


        
    }



}