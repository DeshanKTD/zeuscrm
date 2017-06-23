<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use Auth;

use DB;

class CompanyController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
      // $this->middleware('rolecheckauser');
    }

    //view product list
    public function viewProductList(Request $request){
        $product = DB::table('product_inventories')
            ->join('products', 'product_inventories.model', '=', 'products.model')
            ->select('products.model','products.pname','product_inventories.units')
            ->get();

        return view('company_inventory')->with('product',$product);
    }

    //add a new product to inventory
    public function createProduct(Request $request){
    	//
        DB::table('products')->insert(
            [
                'model' => $request->model,
                'pname' => $request->pname
            ]
            );
        DB::table('product_inventories')->insert(
            [
                'model' => $request->model,
                'units' => 0
            ]);

        $product = DB::table('product_inventories')
            ->join('products', 'product_inventories.model', '=', 'products.model')
            ->select('products.model','products.pname','product_inventories.units')
            ->get();

        return view('company_inventory')->with('product',$product);

    }

    //delete a product from inventory
    public function deleteProduct(Request $request){

    }

    //add product units to inventory
    public function addProdcut(Request $request){

    }

    //remove product units from inventory
    public function removeProduct(Request $request){

    }

    //remove customer order
    public function removeCustomerOrder(Request $request){

    }

    //accept customer order
    public function acceptCustomerOrder(Request $request){

    }

    //view customer order
    public function viewCustomerOrder(Request $request){
        $corders = DB::table('customer_orders')
            ->join('users', 'customer_orders.email', '=', 'users.email')
            ->select('customer_orders.oderno', 'users.fname', 'users.lname', 'users.company','customer_orders.reqdate')
            ->get();

        return view('company_view')->with('corders',$corders);
    }

    //view custmer oderlist
    public function viewCustomerOrderList(Request $request){

    }

    //create a new company order
    public function createCompanyOrder(Request $request){
        DB::table('company_orders')->insert([
                'oderno' => $request->oderno,
                'email' => Auth::user()->email,
                'model' => $request->model,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'reqdate' => $request->reqdate,
                'amount' => $request->amount,
                'confirmed' -> $request->confirmed
            ]);
        $order = DB::table('company_orders')
                ->join('users','company_orders.email','=','users.email')
                ->join('products','company_orders.model','=','products.model')
                ->select('company_orders.oderno','users.fname','users.lname','company_orders.reqdate','company_orders.created_at','company_orders.amount','products.model','products.pname','company_orders.confirmed')
                ->get();
        $product = DB::table('products')->select('model','pname')->get();

        return view('company_orders')->with('order',$order)->with('product',$product);
        

    } 

    //view company order
    public function viewCompanyOrder(Request $request){

    }

    //view company oderlist
    public function viewCompanyOrderList(Request $request){

        $order = DB::table('company_orders')
                ->join('users','company_orders.email','=','users.email')
                ->join('products','company_orders.model','=','products.model')
                ->select('company_orders.oderno','users.fname','users.lname','company_orders.reqdate','company_orders.created_at','company_orders.amount','products.model','products.pname','company_orders.confirmed')
                ->get();
        $product = DB::table('products')->select('model','pname')->get();

        return view('company_orders')->with('order',$order)->with('product',$product);
    }

    //view clients
    public function viewClients(Request $request){
        $cusers =  DB::table('users')->select('fname','lname', 'email','company','telephone')->where('role', '=', 'client')->get();
        return view('company_clients')->with('cusers',$cusers);
    }


    //add client
    public function addClient(Request $request){
        $rolec = "client";
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
        $cusers =  DB::table('users')->select('fname','lname', 'email','company','telephone')->where('role', '=', 'client')->get();
        return view('company_clients')->with('cusers',$cusers);
    }



}