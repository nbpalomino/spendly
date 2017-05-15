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
$app->get('/', 'WebController@index');
$app->get('/login', 'GuardController@login');
$app->post('/login', 'GuardController@doLogin');
$app->get('/logout', 'GuardController@logout');
$app->get('/password-recovery', 'GuardController@recovery');


$app->get('/version', function () use ($app) {
    return $app->version();
});
