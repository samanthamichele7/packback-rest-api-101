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
	return View::make('hello');
});

/**
 * Explicit routes for each of the controller methods you need in your API
 *
 * Grouped within an API prefix so that you have to access it through http://url.com/api/...
 *
 */

Route::group(['prefix' => 'api'], function() {
    Route::group(['prefix' => 'books'], function(){
        Route::get('', 				    array('uses' => 'BookController@index'));
        Route::get('{book_id}', 	    array('uses' => 'BookController@show'));
        Route::post('', 			    array('uses' => 'BookController@store'));
        Route::patch('{book_id}', 		array('uses' => 'BookController@update'));
        Route::delete('{book_id}',		array('uses' => 'BookController@destroy'));
    });

    Route::group(['prefix' => 'users'], function(){
        Route::get('', 				                array('uses' => 'UserController@index'));
        Route::get('{user_id}', 			        array('uses' => 'UserController@show'));
        Route::get('{user_id}/books',               array('uses' => 'UserController@showBooks'));
        Route::post('', 			                array('uses' => 'UserController@store'));
        Route::post('{user_id}/books/{book_id}',    array('uses' => 'UserController@storeBooks'));
        Route::patch('{user_id}', 			        array('uses' => 'UserController@update'));
        Route::delete('{user_id}',		            array('uses' => 'UserController@destroy'));
        Route::delete('{user_id}/books/{book_id}',  array('uses' => 'UserController@destroyBooks'));
    });
});
