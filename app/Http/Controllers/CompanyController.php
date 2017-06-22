<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CompanyController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
      // $this->middleware('rolecheckauser');
    }

    //view product list
    public function viewProductList(Request $request){
        return view('company_inventory');
    }

    //add a new product to inventory
    public function createProduct(Request $request){
    	//
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
        return view('company_view');
    }

    //view custmer oderlist
    public function viewCustomerOrderList(Request $request){

    }

    //create a new company order
    public function createCompanyOrder(Request $request){

    } 

    //view company oderlist
    public function viewCompanyOrderList(Request $request){
        return view('company_orders');
    }

    //view clients
    public function viewClients(Request $request){
        return view('company_clients');
    }


}