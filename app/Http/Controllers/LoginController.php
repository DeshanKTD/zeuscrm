<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class LoginController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            $role = Auth::user()->role;
            if($role==='admin'){
            	return view('admin_view');
            }
            
            else if($role==='client'){
            	return view('client_view');
            }

            else if($role==='user'){
            	return view('company_view');
            }
            return view('welcome');
        }
    }
}
