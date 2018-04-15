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

Verb	URI	Action	Route Name
GET	/photos	index	photos.index
GET	/photos/create	create	photos.create
POST	/photos	store	photos.store
GET	/photos/{photo}	show	photos.show
GET	/photos/{photo}/edit	edit	photos.edit
PUT/PATCH	/photos/{photo}	update	photos.update
DELETE	/photos/{photo}	destroy	photos.destroy
*/
$router->group(['prefix'=>'v1'], function() use ($router) {
    $router->group(['prefix'=>'me'], function() use ($router) {
    	$router->get('/', 'UserController@index');
    });

    $router->group(['prefix'=>'users'], function() use ($router) {
    	$router->get('/', 'UserController@index');
    	$router->get('/create', 'UserController@create');
    	$router->post('/', 'UserController@store');
    	$router->get('/{id}', 'UserController@show');
    	$router->get('/{id}/edit', 'UserController@edit');
    	$router->put('/{id}', 'UserController@update');
    	$router->delete('/{id}', 'UserController@delete');
    });
});