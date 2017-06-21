<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
    }

    //add user
    public function addUser(Request $request){

    }

    //remove user
    public function removeUser(Request $request){

    }


    //modify user
    public function modifyUser(Request $request){

    }


    //view users
    public function viewUsers(Request $request){
    	
    }
}
