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

        $router->group(['prefix' => 'merchant'], function () use ($router) {
            $router->get('/', 'MerchantController@index');
            $router->get('/{id}', 'MerchantController@show');
            $router->post('/', 'MerchantController@store');
            $router->put('/{id}', 'MerchantController@update');
            $router->delete('/{id}', 'MerchantController@destroy');
        });

        $router->group(['prefix' => 'passenger'], function () use ($router) {
            $router->get('/', 'PassengerController@index');
            $router->get('/{id}', 'PassengerController@show');
            $router->post('/', 'PassengerController@store');
            $router->put('/{id}', 'PassengerController@update');
            $router->delete('/{id}', 'PassengerController@destroy');
        });

        $router->group(['prefix' => 'booth'], function () use ($router) {
            $router->get('/', 'BoothController@index');
            $router->get('/{id}', 'BoothController@show');
            $router->post('/', 'BoothController@store');
            $router->put('/{id}', 'BoothController@update');
            $router->delete('/{id}', 'BoothController@destroy');
        });

        $router->group(['prefix' => 'vehicle'], function () use ($router) {
            $router->get('/', 'VehicleController@index');
            $router->get('/{id}', 'VehicleController@show');
            $router->post('/', 'VehicleController@store');
            $router->put('/{id}', 'VehicleController@update');
            $router->delete('/{id}', 'VehicleController@destroy');
        });

        $router->group(['prefix' => 'ticket'], function () use ($router) {
            $router->get('/', 'TicketController@index');
            $router->get('/{id}', 'TicketController@show');
            $router->post('/', 'TicketController@store');
            $router->put('/{id}', 'TicketController@update');
            $router->delete('/{id}', 'TicketController@destroy');
        });
    });
});
