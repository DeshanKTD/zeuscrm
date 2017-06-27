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
            	return redirect('/adminhome');
            }
            
            else if($role==='client'){
            	return redirect('/clienthome');
            }

            else if($role==='user'){
            	return redirect('/clientorder');
            }
            return view('welcome');
        }
    }

    public function returnhome(Request $request){
        if (Auth::check()) {
            // Authentication passed...
            $role = Auth::user()->role;
            if($role==='admin'){
                return redirect('/adminhome');
            }

            else if($role==='client'){
                return redirect('/clienthome');
            }

            else if($role==='user'){
                return redirect('/clientorder');
            }
            return view('welcome');
        }
    }
}
