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
use Validator;

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
           
            $trabajador=Trabajador::where('user_id', Auth::id())->first();
         
            return view('home', [

                'trabajador'=>$trabajador
            ]);


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
        $messages = [
            'required'=>'No se puede dejar ningún campo en blanco',
            'fecha.date'=>'Error en la fecha',
            'fecha.before'=>'La fecha tiene que ser anterior a la actual',
            'image'=>'Error en el archivo subido',
            'max:1999'=>'Error en el archivo subido'
     
        ];
       
       
       
        $Validator=Validator::make(
            $request->all(),
            [
            'direccion' => 'required',
            'dni' => 'required',
            'fecha' => 'required|date|before:today',
            'Provincia' => 'required',
            'telefono' => 'required',
            'imagen'=> 'image|nullable|max:1999'
            ], 
            $messages);

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

            $mitrabajador=Trabajador::where('user_id', Auth::id())->first();

            if ($Validator->fails()) {
                $Response=$Validator->messages();
            }else if (!$mitrabajador) {
        

        $mitrabajador=new Trabajador();
        $mitrabajador->direccion=$request->get('direccion');
        $mitrabajador->dni=$request->get('dni');
        $mitrabajador->fecha=$request->get('fecha');
        $mitrabajador->provincia_id=$request->get('Provincia');
        $mitrabajador->telefono=$request->get('telefono');
        $mitrabajador->user_id=Auth::id();
        $mitrabajador->imagen=$fileNameToStore;
        
        $mitrabajador->save();

        $Response=['success'=>'Curriculum dado de alta'];
             
        } else {
            $mitrabajador=Trabajador::where('user_id', Auth::id())->first();
            $mitrabajador->direccion=$request->get('direccion');
            $mitrabajador->dni=$request->get('dni');
            $mitrabajador->fecha=$request->get('fecha');
            $mitrabajador->provincia_id=$request->get('Provincia');
            $mitrabajador->telefono=$request->get('telefono');
            $mitrabajador->user_id=Auth::id();
            $mitrabajador->imagen=$fileNameToStore;
            $mitrabajador->save();
            $Response=['success'=>'Curriculum actualizado'];

        }
        return response()->json($Response, 200);

    }








        
    

    public function store(Request $request)
    {
        $provincias=Provincia::all();
  


        $messages = [
            'required'=>'No se puede dejar ningún campo en blanco',
            'date'=>'Error en las fechas'
     
        ];
       
       
       
        $Validator=Validator::make(
            $request->all(),
            [
                'tituloexp' => 'required',
                'empresaexp' => 'required',
                'inicioexp' => 'required|date|before:finexp',
                'finexp' => 'required|date|after:inicioexp',
                'cat' => 'required',
                'desexp' => 'required',
             
            ], 
            $messages);

         

            $mitrabajador=Trabajador::where('user_id', Auth::id())->first();

            if ($Validator->fails()) {
                $Response=$Validator->messages();
            }        
         else {
            $miexperiencia=new Experiencia();
            $miexperiencia->puesto=$request->input('tituloexp');
            $miexperiencia->empresa=$request->input('empresaexp');
            $miexperiencia->inicio=$request->input('inicioexp');
            $miexperiencia->fin=$request->input('finexp');
            $miexperiencia->categoria_id=$request->input('cat');
            $miexperiencia->descripcion=$request->input('desexp');
            $miexperiencia->user_id=Auth::id();
    
            $miexperiencia->save();

            $Response=['success'=>'Experiencia Añadida'];

        }
        return response()->json($Response, 200);


        
    }



}