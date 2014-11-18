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
 * Route::resource automatically looks for create, edit, index, show, store, update, and destroy
 * methods in your controllers without having to define them here
 *
 * It's less code, but it can be confusing if you have a lot of resources and custom routes
 *
 * See http://laravel.com/docs/4.2/controllers#restful-resource-controllers for more info
 *
 * Grouped within an API prefix so that you have to access it through http://url.com/api/...
 *
 */

Route::group(['prefix' => 'api'], function() {
    Route::resource('users', 'UserController');
    Route::resource('books', 'BookController');
});
