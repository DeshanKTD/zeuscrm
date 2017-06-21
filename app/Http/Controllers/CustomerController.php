<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
    }

    //make a order
    public function createOrder(Request $request){
      $uri = $request->path();
      echo '<br>URI: '.$uri;
      
      $url = $request->url();
      echo '<br>';
      
      echo 'URL: '.$url;
      $method = $request->method();
      echo '<br>';
      
      echo 'Method: '.$method;
   }

   //view order
   public function viewOrder(Request $request){

   }

   //view placed all order
   public function viewAllOrders(Request $request){
   	
   }


   //cancel request
   public function cancelOrder(Request $request){

   }



}
