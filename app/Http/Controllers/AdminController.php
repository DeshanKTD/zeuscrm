<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use DB;

class AdminController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
      //$this->middleware('rolecheckadmin');
    }

    //add user
    public function addUser(Request $request){
    	DB::table('users')->insert(
    		[
    			'fname' => $request->fname,
    			'lname' => $request->lname,
    			'email' => $request->email,
    			'password' => Hash::make($request->password),
    			'address' => $request->address,
    			'telephone' => $request->telephone,
    			'company' => $request->company,
    			'role' => $request->role

    		]
		);
        return view('admin_view');

    }

    //remove user
    public function removeUser(Request $request){
    	DB::table('users')->where('email', '=', $request->email)->delete();
    }


    //modify user
    public function modifyUser(Request $request){
        DB::table('users')->where('email', '=', $request->email)->delete();
        DB::table('users')->insert(
            [
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'telephone' => $request->telephone,
                'company' => $request->company,
                'role' => $request->role

            ]
        );

    }


    //view users
    public function viewUsers(Request $request){
            return view('admin_view');
    }

    //view adduser
    public function addUserView(Request $request){
        return view('registeruser');
    }
}
