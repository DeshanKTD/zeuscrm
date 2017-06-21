<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class AdminController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
    }

    //add user
  //   public function addUser(Request $request){
  //   	DB::table('users')->insert(
  //   		[
  //   			'fname' => $request->fname,
  //   			'lname' => $request->lname,
  //   			'email' => $request->email,
  //   			'password' => $request->password,
  //   			'address' => $request->address,
  //   			'telephone' => $request->telephone,
  //   			'company' => $request->company,
  //   			'role' => $request->role

  //   		]
		// );
  //   }

    //remove user
    public function removeUser(Request $request){
    	DB::table('users')->where('email', '=', $request->email)->delete();
    }


    //modify user
    public function modifyUser(Request $request){

    }


    //view users
    public function viewUsers(Request $request){

    }
}
