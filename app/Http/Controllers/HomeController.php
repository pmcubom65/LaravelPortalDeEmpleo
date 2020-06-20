<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Trabajador;
use App\Provincia;
use App\Categoria;
use App\Experiencia;
use App\Empresa;
use App\Contacto;
use App\Oferta_trabajador;

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
            $contarexperiencias=Experiencia::where('user_id', Auth::id())->count();

            if ($trabajador>0) {
                $trabajadorseleccionado=Oferta_trabajador::where('trabajador_id', $trabajadorlog->id)->where('seleccionado',1)->get();
                $elid=$trabajadorlog->id;
                $lascandidaturas=Trabajador::find($elid)->ofertasempleo()->orderBy('id')->get();
            }



            if ($contarexperiencias===0) {
                return view('home', [

                    'trabajador'=>$trabajador,
                    'curriculum'=>$trabajadorlog,
                    'experienciass'=>$contarexperiencias,
                 ]); 
            } else {

            $lasexperiencias=Experiencia::where('user_id', Auth::id())->orderBy('fin','desc')->get();
      
            return view('home', [
            'trabajador'=>$trabajador,
            'curriculum'=>$trabajadorlog,
            'experienciass'=>$lasexperiencias,
            
             'candidaturas'=>$lascandidaturas,
             
             'trabajadorseleccionado'=>$trabajadorseleccionado
             ]);
           }






            
  

            

            


        } elseif (Auth::user()->rol_id===2) {
 
            return view('home2', [
                'datos' =>  Auth::user(),
                'contador'=> Empresa::where('user_id', Auth::id())->count(), 
                'datosemp'=> Empresa::where('user_id', Auth::id())->first()
                ]);
            
         
        }else {
            return 'estoy como admin';
            
        }

        
    }




















    public function put(Request $request) {
        $validatedData = $request->validate([
    

            'direccion' => 'required',
            'dni' => 'required',
            'fecha' => 'required|date|before:today',
            'Provincia' => 'required',
            'telefono' => 'required',
            'imagen'=> 'image|nullable|max:1999'
        ]);

            if($request->hasFile('imagen')){
                //filename con extension
                $filenameWithExt=$request->file('imagen')->getClientOriginalName();
                //solo filename
                $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //extension
                $extension=$request->file('imagen')->getClientOriginalExtension();

                //filename a almacenar
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                //subir la imagen
                $path=$request->file('imagen')->storeAs('public/imagenes', $fileNameToStore);
            }else {
                $fileNameToStore='noimage.jpg';
            }






        $tienetrabajo=Trabajador::where('user_id', Auth::id())->count();

        if ($tienetrabajo===0) {
        

        $mitrabajador=new Trabajador();
        $mitrabajador->direccion=$request->get('direccion');
        $mitrabajador->dni=$request->get('dni');
        $mitrabajador->fecha=$request->get('fecha');
        $mitrabajador->provincia_id=$request->get('Provincia');
        $mitrabajador->telefono=$request->get('telefono');
        $mitrabajador->user_id=Auth::id();
        $mitrabajador->imagen=$fileNameToStore;
        
        $mitrabajador->save();

        $trabajador=Trabajador::where('user_id', Auth::id())->count();  //1
        $trabajadorlog=Trabajador::where('user_id', Auth::id())->first();    //ok

        $lasexperiencias=Experiencia::where('user_id', Auth::id())->count();
  
            return view('home', ['trabajador'=>$trabajador,
            'curriculum'=>$trabajadorlog,
            'experienciass'=>$lasexperiencias,
            'datos' => $request->user(), 
            ]); 
             
        } else {
            $mitrabajador=Trabajador::where('user_id', Auth::id())->first();
            $mitrabajador->direccion=$request->get('direccion');
            $mitrabajador->dni=$request->get('dni');
            $mitrabajador->fecha=$request->get('fecha');
            $mitrabajador->provincia_id=$request->get('Provincia');
            $mitrabajador->telefono=$request->get('telefono');
            $mitrabajador->user_id=Auth::id();
            
            $mitrabajador->save();
            return back(); 

        }


    }








        
    

    public function store(Request $request)
    {
        $provincias=Provincia::all();
        $categorias=Categoria::all();
        $lasempresas=Empresa::all();

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
                            'categorias'=>$categorias,
                            'empresas'=>$lasempresas 
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
                            'categorias'=>$categorias,
                            'empresas'=>$lasempresas
                            ]);





        }


        
    }



}