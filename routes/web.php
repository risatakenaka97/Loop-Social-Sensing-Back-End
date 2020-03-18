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

$router->get('/', function() use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function(Router $router) {
    $router->group(['prefix' => 'user'], function(Router $router) {
        $router->get('/', 'App\Http\User\Controller\UserController@index');
        $router->post('/register', 'App\Http\User\Controller\UserController@register');
        $router->post('/login', 'App\Http\User\Controller\UserController@login');
    });
});
