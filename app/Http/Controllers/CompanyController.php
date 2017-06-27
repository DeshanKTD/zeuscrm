<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use Auth;

use DB;

use App\ProductInventory;

use App\CompanyOrders;

use App\CustomerOrders;

use App\Products;

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
        ProductInventory::where('model','=',$request->model)->delete();
        Products::where('model','=',$request->model)->delete();

        $product = DB::table('product_inventories')
            ->join('products', 'product_inventories.model', '=', 'products.model')
            ->select('products.model','products.pname','product_inventories.units')
            ->get();

        return view('company_inventory')->with('product',$product);

    }


    //remove customer order
    public function removeCustomerOrder(Request $request){
        CustomerOrders::where('oderno','=',$request->oderno)->delete();

    }

    //accept customer order
    public function acceptCustomerOrder(Request $request){
        CustomerOrders::where('oderno',$request->oderno)->update(['confirmed'=>1]);
        $order = CustomerOrders::find($request->oderno);

        $model = ProductInventory::find($order->model);
        $model->units-=$order->amount;
        $model->save();

        $cuorder = DB::table('customer_orders')
            ->join('users','customer_orders.email','=','users.email')
            ->join('products','customer_orders.model','=','products.model')
            ->select('customer_orders.oderno','users.fname','users.lname','users.company','customer_orders.reqdate','customer_orders.created_at','customer_orders.amount','products.model','products.pname','customer_orders.confirmed')
            ->get();

        return view('company_view')->with('cuorder',$cuorder);
    }

    //view customer order
    public function viewCustomerOrder(Request $request){
        $cuorder = DB::table('customer_orders')
            ->join('users','customer_orders.email','=','users.email')
            ->join('products','customer_orders.model','=','products.model')
            ->select('customer_orders.oderno','users.fname','users.lname','users.company','customer_orders.reqdate','customer_orders.created_at','customer_orders.amount','products.model','products.pname','customer_orders.confirmed')
            ->get();

        return view('company_view')->with('cuorder',$cuorder);
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
                'confirmed' => $request->confirmed
            ]);
        $order = DB::table('company_orders')
                ->join('users','company_orders.email','=','users.email')
                ->join('products','company_orders.model','=','products.model')
                ->select('company_orders.oderno','users.fname','users.lname','company_orders.reqdate','company_orders.created_at','company_orders.amount','products.model','products.pname','company_orders.confirmed')
                ->get();
        $product = DB::table('products')->select('model','pname')->get();

        return view('company_orders')->with('order',$order)->with('product',$product);
        

    }

    //arrived company order
    public function arrivedOrder(Request $request){
        DB::table('company_orders')->where('oderno',$request->oderno)->update(['confirmed'=>1]);
        $order = CompanyOrders::find($request->oderno);

        $model = ProductInventory::find($order->model);
        $model->units+=$order->amount;
        $model->save();


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