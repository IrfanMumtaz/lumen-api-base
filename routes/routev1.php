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

$router->group(['prefix' => 'v1', 'namespace' => 'V1'], function () use ($router) {
    $router->group(['prefix' => 'auth', 'middleware' => 'client-credendials'], function () use ($router) {
        $router->post('/get-access-token', 'AuthController@getAccessToken');
        $router->post('/register', 'AuthController@register');
    });

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->group(['prefix' => 'acl'], function () use ($router) {
            $router->get('/role', 'RoleController@index');
            $router->get('/permission', 'RoleController@permission');
            $router->get('/role/{id}', 'RoleController@show');
            $router->post('/role', 'RoleController@store');
            $router->put('/role/{id}', 'RoleController@update');
            $router->delete('/role/{id}', 'RoleController@destroy');
        });
    });
});
