<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::route('login');
});


Route::group(array('before' => 'auth'), function(){
	Route::get('dashboard/', array('as' => 'home', 'uses' => 'StockController@index' ));

	Route::get('dashboard/addstock', array('as' => 'addstock', 'uses' => 'StockController@addstock' ));
	Route::get('dashboard/addcategory', array( 'as' => 'addcategory', 'uses' => 'StockController@addcategory' ));
	Route::get('dashboard/addoutflow', array( 'as' => 'addoutflow', 'uses' => 'StockController@addoutflow' ));
	Route::get('dashboard/updatestock', array( 'as' => 'updatestock', 'uses' => 'StockController@updatestock'));
	Route::get('dashboard/editstock', array('as' => 'editstock', 'uses' => 'StockController@editstock' ));
	Route::get('dashboard/editstockinfo', array('as' => 'editstockinfo', 'uses' => 'StockController@editstockinfo' ));
	Route::get('dashboard/editstockinfo/{id}', array('as' => 'editstockinfo', 'uses' => 'StockController@editstockinfo' ));
	Route::get('dashboard/viewpayment', array('as' => 'viewpayment', 'uses' => 'PaymentController@payment' ));
	Route::post('dashboard/viewpayment', array('as' => 'viewpayment', 'uses' => 'PaymentController@executeSearch'));

	Route::post('dashboard/addtostock', array('as' => 'addtostock', 'uses' => 'StockController@addtostock' ));
	Route::post('dashboard/addtocategory', array('as' => 'addtocategory', 'uses' => 'StockController@addtocategory' ));
	Route::post('dashboard/addtooutflow', array('as' => 'addtooutflow', 'uses' => 'StockController@addtooutflow'));
	Route::post('dashboard/updatetostock', array('as' => 'updatetostock', 'uses' => 'StockController@updatetostock'));
	Route::post('dashboard/updatetostockinfo', array('as' => 'updatetostockinfo', 'uses' => 'StockController@updatetostockinfo'));
	Route::get('dashboard/activate/{id}', array('as' => 'activate', 'uses' => 'StockController@activate'));

	Route::get('dashboard/viewstock', array('as' => 'viewstock', 'uses' => 'StockController@viewstock' ));
	Route::get('dashboard/viewitem', array('as' => 'viewitem', 'uses' => 'StockController@viewitem' ));
	Route::get('dashboard/viewlog', array('as' => 'viewlog', 'uses' => 'StockController@viewlog' ));
	Route::get('dashboard/viewuser', array('as' => 'viewuser', 'uses' => 'StockController@viewuser' ));


});
	
	Route::get('register', array('as' => 'register', 'uses' => 'UserController@create' ));

	Route::post('register', array('as' => 'register', 'uses' => 'UserController@store' ));

	/*Route::get('dashboard/addtocycle/{id?}', array('as' => 'addtocycleform', 'uses' => 'DashboardController@addtocycleform' ));
	Route::post('dashboard/additiontocycle', array('as' => 'additiontocycle', 'uses' => 'DashboardController@addtocycle' ));
	*/
	Route::get('login', array('as' => 'login', 'uses' => 'UserController@index' ))->before('guest');
	
	Route::post('login', array('as' => 'login', 'uses' => 'UserController@login' ));

	Route::get('logout', array('as' => 'logout', function () {
    		Auth::logout();
    		return Redirect::route('login')->with('flash_notice', 'You are successfully logged out.');
	}))->before('auth');