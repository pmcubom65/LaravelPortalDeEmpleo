<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Test1Controller extends Controller
{
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }


    public function hacer() {
        $name = $this->request->input('name');
       return view('auth.register', ['empresa', $name]);
        
    }
}
