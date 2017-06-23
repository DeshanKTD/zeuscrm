<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Input;

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
        $cusers =  DB::table('users')->select('fname','lname', 'email','company','role')->get();
        return view('admin_view')->with('cusers',$cusers);

    }

    //remove user
    public function removeUser(Request $request){
        $data = Input::all();;
        $email= $data['email'];
    	DB::table('users')->where('email', '=', $email)->delete();

        $cusers =  DB::table('users')->select('fname','lname', 'email','company','role')->get();
        return view('admin_view')->with('cusers',$cusers);
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
            $cusers =  DB::table('users')->select('fname','lname', 'email','company','role')->get();
            return view('admin_view')->with('cusers',$cusers);
    }

    //view adduser
    public function addUserView(Request $request){
        return view('registeruser');
    }
}
