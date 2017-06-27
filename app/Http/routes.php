<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::post('log','LoginController@authenticate');

Route::get('logcheck','LoginController@returnhome');

///============= Admin =================================

//admin page routes
Route::get('/adminhome','AdminController@viewUsers');

Route::get('/adduserview', 'AdminController@addUserView');

//admin functions
Route::post('/adduser','AdminController@addUser');

Route::post('/removeuser','AdminController@removeUser');




///============= Customer/client ==========================

//client page routes
Route::get('/clienthome','CustomerController@viewCurrentOrders');

Route::get('/addorder','CustomerController@addOrderView');


//client functions
Route::post('/clientmakeorder','CustomerController@createOrder');




///============== Company User ==============================

//company page routes
Route::get('/products','CompanyController@viewProductList');

Route::get('/clientorder','CompanyController@viewCustomerOrder');

Route::get('/companyorder','CompanyController@viewCompanyOrderList');

Route::get('/clients','CompanyController@viewClients');

//company functions

Route::post('/addproduct','CompanyController@createProduct');

Route::post('/addclient','CompanyController@addClient');

Route::post('/makecompanyorder','CompanyController@createCompanyOrder');

Route::post('/arrivedorder','CompanyController@arrivedOrder');

Route::post('/acceptcusorder','CompanyController@acceptCustomerOrder');

Route::post('/deleteproduct','CompanyController@deleteProduct');
