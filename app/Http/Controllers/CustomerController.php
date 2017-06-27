<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

class CustomerController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('rolecheckclient');
    }

    //make a order
    public function createOrder(Request $request){
        DB::table('customer_orders')->insert([
            'oderno' => $request->oderno,
            'email' => Auth::user()->email,
            'model' => $request->model,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'reqdate' => $request->reqdate,
            'amount' => $request->amount,
            'confirmed' => $request->confirmed
        ]);

        $product = DB::table('products')->select('model','pname')->get();
        return view('client_order')->with('product',$product);
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


  //view customer home page
   public function viewCurrentOrders(Request $request){
       $order = DB::table('customer_orders')
           ->join('users','customer_orders.email','=','users.email')
           ->join('products','customer_orders.model','=','products.model')
           ->select('customer_orders.oderno','users.fname','users.lname','customer_orders.reqdate','customer_orders.created_at','customer_orders.amount','products.model','products.pname','customer_orders.confirmed')
           ->where('users.company','=',Auth::user()->company)
           ->get();
       return view('client_view')->with('order',$order);
   }

  //view customer add order page
   public function addOrderView(Request $request){
       $product = DB::table('products')->select('model','pname')->get();
       return view('client_order')->with('product',$product);
   }


   //


}
