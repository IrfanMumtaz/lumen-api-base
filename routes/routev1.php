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
        $router->post('/login', 'AuthController@login');
        $router->post('/register', 'AuthController@register');
    });

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->group(['prefix' => 'acl'], function () use ($router) {
            $router->get('/roles', 'RoleController@index');
            $router->get('/roles/{id}', 'RoleController@show');
            $router->post('/roles', 'RoleController@store');
            $router->put('/roles/{id}', 'RoleController@update');
            $router->delete('/roles/{id}', 'RoleController@destroy');
        });
    });
});
