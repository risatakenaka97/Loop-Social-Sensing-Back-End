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


$router->group(['prefix' => 'api'], function(Router $router) {
    $router->group(["middleware" => "auth:api"], function(Router $router) {
        $router->group(['prefix' => 'feedback'], function(Router $router) {
            //reviews api routes
            $router->group(['prefix' => 'review'], function(Router $router) {
                $router->get('/', 'FeedbackController@index');
                $router->post('/', 'FeedbackController@store');
            });
            //response api routes
            $router->group(['prefix' => 'response'], function(Router $router) {
//                $router->get('/', 'ResponseController@index');
            });
        });
    });
});
