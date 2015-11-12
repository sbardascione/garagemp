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


/**
 * Display Search Page
 */
Route::get('/search', function () {
	$categories = [''=>''] +  App\category::lists('name','id')->all();
	$data = array();
	$data['categories'] = $categories;
	$data['selected_category'] = '';
	$data['brands'] = "<select class = \"form-control\"></select>";
    return view('search',compact(array('data',$data)));
});

Route::get('/search/{name}', 'SearchController@index');


