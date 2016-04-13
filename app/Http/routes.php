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

//Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

get('/', ['as'=>'posts', 'uses'=>'PostController@index']);
get('unpublished', ['as'=>'posts.unpublished', 'uses'=>'PostController@unpublished']);
get('category1', ['as'=>'posts.category1', 'uses'=>'PostController@category1']);
get('category2',['as'=>'posts.category2', 'uses'=>'PostController@category2']);

//////////////////////////////////////////////////////////////////////////////
get('category',['as'=>'posts.category', 'uses'=>'PostController@ShowCategory']);
/////////////////////////////////////////////////////////////////////////////
/** */
/*get('/error', ['as'=>'AuthError', 'uses'=>'PostController@create']);*/
/** */

$router->resource('post', 'PostController');// cоздает то же что и выше + destroy