<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an API.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$app->group(['prefix'=>'v1'], function() use ($app) {
    $app->group(['prefix'=>'me'], function() use ($app) {
    	$app->get('/', 'UserController@index');
    });

    $app->group(['prefix'=>'users'], function() use ($app) {
    	$app->get('/', 'UserController@index');
    	$app->get('/create', 'UserController@create');
    	$app->post('/', 'UserController@store');
    	$app->get('/{id}', 'UserController@show');
    	$app->get('/{id}/edit', 'UserController@edit');
    	$app->put('/{id}', 'UserController@update');
    	$app->delete('/{id}', 'UserController@delete');
    });
});
