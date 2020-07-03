<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;



class AdministratorsController extends Controller
{
    use AuthenticatesUsers;
    protected $guard='admins';

    public function showLoginForm()
    {
       
        
        return view('administrators.login');
    }

    protected function guard()
{
    return Auth::guard('admins');
}

    public function authenticated() {
        return redirect('admins/area');
    }

    public function areaadmin() {
        return 'homa mi admin de amor';
    }


}
