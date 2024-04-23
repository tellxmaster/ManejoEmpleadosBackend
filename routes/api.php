<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProvinceController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/employees', 'EmployeeController@list');
    $router->get('/employees/{id}', 'EmployeeController@show');
    $router->post('/employees', 'EmployeeController@store');
    $router->post('/employees/{id}', 'EmployeeController@update');
    $router->delete('/employees/{id}', 'EmployeeController@destroy');

    $router->get('/provinces', 'ProvinceController@list');
});
