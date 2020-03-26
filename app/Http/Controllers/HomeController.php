<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trabajador;

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
            $todos=User::all();
            foreach($todos as $todo) {
                echo $todo;
            }

            $trabajador=Trabajador::where('user_id', $request->user()->user_id)->firstOrFail();

            return view('home', ['datos' => $trabajador]);

        //    return redirect()->action('TrabajadorController@show', ['id'=>$request->user()->rol_id]);

        //return view('home');
        } elseif ($request->user()->rol_id===2) {
        return view('home2');
        }else {
            return view('home2');
        }

        
    }
}
