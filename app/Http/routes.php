<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::any('/register','HomeController@index');

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'AdminController@welcome');

    Route::group(['prefix' => 'role'], function() {
        Route::get('', ['middleware' => 'permission:view-roles', 'uses' => 'RoleController@index']);
        Route::get('create', ['middleware' => 'permission:create-role', 'uses' => 'RoleController@create']);
        Route::post('create', ['middleware' => 'permission:create-role', 'uses' => 'RoleController@store']);
        Route::get('{id}/edit', ['middleware' => 'permission:edit-role', 'uses' => 'RoleController@view']);
        Route::post('{id}/edit', ['middleware' => 'permission:edit-role', 'uses' => 'RoleController@edit']);
        Route::post('{id}/delete', ['middleware' => 'permission:delete-role', 'uses' => 'RoleController@edit']);
    });

    Route::group(['prefix' => 'permission'], function() {
        Route::get('', ['middleware' => 'permission:view-permissions', 'uses' => 'PermissionController@index']);
        Route::get('create', ['middleware' => 'permission:create-permission', 'uses' => 'PermissionController@create']);
        Route::post('create', ['middleware' => 'permission:create-permission', 'uses' => 'PermissionController@store']);
        Route::get('{id}/edit', ['middleware' => 'permission:edit-permission', 'uses' => 'PermissionController@view']);
        Route::post('{id}/edit', ['middleware' => 'permission:edit-permission', 'uses' => 'PermissionController@edit']);
        Route::post('{id}/delete', ['middleware' => 'permission:delete-permission', 'uses' => 'PermissionController@edit']);
    });
});