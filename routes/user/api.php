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

/** @var Router $router */
use Laravel\Lumen\Routing\Router;


$router->group(['prefix' => 'auth'], function(Router $router) {
    $router->post('/sign-in', 'UserController@login');
    $router->post('/sign-up', 'UserController@store');
});

$router->group(['prefix' => 'api'], function(Router $router) {
    $router->group(["middleware" => "auth:api"], function(Router $router) {
        $router->group(['prefix' => 'user'], function(Router $router) {
            $router->get('/edit/{id}', 'UserController@info');
            $router->post('/update[/{id}]', 'UserController@updateUser');
        });
    });
});
