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
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

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

          //  $candidaturas=Oferta_trabajador::where('trabajador_id', $trabajador->id)->first();

          $contactos=collect();
          

          foreach (Contacto::all() as $contacto) {
              if ($contacto->oferta_trabajador->trabajador_id===$trabajador->id && $contacto->oferta_trabajador->seleccionado===1
              && Carbon::parse($contacto->dia)->gte(Carbon::now())) {
                  $contactos->push($contacto);
              }
          }

            if ($trabajador) {
            $candidaturas=Trabajador::find($trabajador->id)->ofertasempleo()->orderBy('updated_at')->get();
            
            }else {
                $candidaturas=[];
            }
         
            return view('home', compact(['trabajador', 'candidaturas', 'contactos']));


        } elseif (Auth::user()->rol_id===2) {
 
            return view('home2', [
               
               
                'datosemp'=> Empresa::where('user_id', Auth::id())->first()
                ]);
            
         
        } 

        
    }




















    public function put(Request $request) {
        $messages = [
            'required'=>'No se puede dejar ningún campo en blanco',
            'fecha.date'=>'Error en la fecha',
            'fecha.before'=>'La fecha tiene que ser anterior a la actual',
            'image64'=>'Error en el archivo subido',
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
            'imagen'=> 'nullable|image64:jpeg,jpg,png'
            ], 
            $messages);

            $mitrabajador=Trabajador::where('user_id', Auth::id())->first();

            if ( $request->get('imagen')) {
            $imageData = $request->get('imagen');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            Image::make($request->get('imagen'))->save(public_path('images/').$fileName);
            }else {
                $fileName='No_image.jpg';
            }

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
        $mitrabajador->imagen=$fileName;
        
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
            $mitrabajador->imagen=$fileName;
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