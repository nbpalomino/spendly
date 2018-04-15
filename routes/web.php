<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', 'WebController@index');

$router->group(['prefix'=>'users'], function() use ($router) {
	$router->get('/', 'UserController@index');
    $router->post('/', 'UserController@store');
});


$router->get('/login', 'GuardController@login');
$router->post('/login', 'GuardController@doLogin');
$router->get('/logout', 'GuardController@logout');
$router->get('/password-recovery', 'GuardController@recovery');

$router->get('/register', 'UserController@create');

$router->group(['prefix'=>'items'], function() use ($router) {
	$router->get('/', 'ItemController@index');
	$router->get('/create', 'ItemController@create');
	$router->post('/', 'ItemController@store');
	$router->get('/{id}', 'ItemController@show');
	$router->get('/{id}/edit', 'ItemController@edit');
	$router->put('/{id}', 'ItemController@update');
	$router->delete('/{id}', 'ItemController@delete');
});


$router->get('/version', function () use ($router) {
	$data = [
		//$router->environment(),
		config()->all(),
	];
	var_dump($router);
    return json_encode($data);
});
