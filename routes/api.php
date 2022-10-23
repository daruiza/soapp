<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\AuthController@login')->name('login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user', 'Api\AuthController@user');
    });
});

Route::group(['prefix' => 'commerce'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CommerceController@index');
        Route::post('store', 'Api\CommerceController@store');
        Route::put('update/{id}', 'Api\CommerceController@update');
        Route::get('showbycommerceid/{id}', 'Api\CommerceController@showByCommerceId');
        Route::get('showbyuserid/{id}', 'Api\CommerceController@showByUserId');
        Route::delete('destroy/{user_id}', 'Api\CommerceController@destroy');
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\UserController@index');
        Route::post('store', 'Api\UserController@store');
        Route::put('update', 'Api\UserController@update');
        Route::put('update/{user_id}', 'Api\UserController@updateById');
        Route::get('showbyuserid/{user_id}', 'Api\UserController@showByUserId');
        Route::get('showbyrolid/{rol_id}', 'Api\UserController@showByRolId');
        Route::delete('destroy/{user_id}', 'Api\UserController@destroy');
    });
});

Route::group(['prefix' => 'upload'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('photo', 'Api\UploadController@photo');
    });
});

Route::group(['prefix' => 'rol'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\RolController@index');
    });
});

Route::group(['prefix' => 'generallist'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\GeneralListController@index');
        Route::get('showbyid/{id}', 'Api\GeneralListController@showById');
        Route::get('showbyname', 'Api\GeneralListController@showByName');
        Route::post('store', 'Api\GeneralListController@store');
        Route::delete('destroy/{id}', 'Api\GeneralListController@destroy');
        Route::put('update/{id}', 'Api\GeneralListController@update');

    });
});

Route::group(['prefix' => 'employee'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\EmployeeController@index');
        Route::post('store', 'Api\EmployeeController@store');
        Route::put('update/{employee_id}', 'Api\EmployeeController@update');
        Route::get('showbyemployeeid/{user_id}', 'Api\EmployeeController@showByEmployeeId');
        Route::delete('destroy/{employee_id}', 'Api\EmployeeController@destroy');
    });
});
