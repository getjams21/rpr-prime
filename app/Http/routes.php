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
    // return view('dashboard.homepage.index');
    if (Auth::check()) {
    	return view('dashboard.homepage.index');
    }else{
    	return view('pages.login');
    }
});

// Middleware Group
Route::group(['middleware' => ['web']], function(){

	// Home|Dashboard Route
	Route::get('/home', function () {
	    return view('dashboard.homepage.index');
	})->middleware('auth');

	// Users
	Route::get('/users', 'UsersController@index')->middleware('auth');
	Route::post('/users/createuser', 'UsersController@create');
	Route::post('/edituser', 'UsersController@toEditUser')->name('edituser');
	Route::get('/deactivate-user/{id}', 'UsersController@destroy');

	// Branches
	Route::get('/branches', 'BranchesController@index')->middleware('auth');
	Route::post('/branches/createbranch', 'BranchesController@create');
	Route::post('/editbranch', 'BranchesController@toEditBranch')->name('editbranch');
	Route::get('/deactivate-branch/{id}', 'BranchesController@destroy');

	//Customers
	Route::get('/customers', 'CustomersController@index')->middleware('auth');
	Route::post('/customers/createcustomer', 'CustomersController@create');
	Route::post('/editcustomer', 'CustomersController@toEditCustomer')->name('editcustomer');
	Route::get('/deactivate-customer/{id}', 'CustomersController@destroy');
	Route::post('/customerSearch', 'CustomersController@customerSearch')->name('customerSearch');

	// Items
	Route::get('/items', 'ItemsController@index')->middleware('auth');
	Route::post('/items/createitem', 'ItemsController@create');
	Route::post('/edititem', 'ItemsController@toEditItem')->name('edititem');
	Route::get('/deactivate-item/{id}', 'ItemsController@destroy');
	Route::post('/imagePreviewURL', 'ItemsController@imagePreview')->name('imagePreviewURL');
	Route::post('/getItem', 'ItemsController@getItem')->name('getItem');
	// Route::post('/itemViewURL', 'ItemsController@viewItem')->name('itemViewURL');

	// Quotations
	Route::get('/quotations', 'QuotationsController@index')->middleware('auth');
	Route::get('/quotations/new', 'QuotationsController@create')->middleware('auth');
	Route::post('/quotations/createquotation', 'QuotationsController@saveQuotation');
	Route::post('/quotations/editquotation', 'QuotationsController@editQuotation');
	Route::post('/quotations/dealProject', 'QuotationsController@dealProject')->name('dealProject');

	//QuotationDetails
	Route::post('/itemViewURL', 'QuotationDetailsController@viewItem')->name('itemViewURL');

	Route::auth();

	// Route::get('/homes', 'HomeController@index');
});

Route::get('/logout', 'Auth\AuthController@logout');