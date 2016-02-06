<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware' => 'web'], function () {
    Route::auth();

    Route::get('roles', ['as'=>'roles.index', 'uses'=>'Admin\RolesController@index']);
    Route::get('roles/new', ['as'=>'roles.create', 'uses'=>'Admin\RolesController@create']);
    Route::post('roles/store', ['as'=>'roles.store', 'uses'=>'Admin\RolesController@store']);
    Route::get('roles/edit/{id}', ['as'=>'roles.edit', 'uses'=>'Admin\RolesController@edit']);
    Route::put('roles/update/{id}', ['as'=>'roles.update', 'uses'=>'Admin\RolesController@update']);
    Route::get('roles/destroy/{id}', ['as'=>'roles.destroy', 'uses'=>'Admin\RolesController@destroy']);
    Route::get('roles/permissions/{id}', ['as'=>'roles.permissions', 'uses'=>'Admin\RolesController@permissions']);
    Route::post('roles/permissions/{id}/store', ['as'=>'roles.permissions.store', 'uses'=>'Admin\RolesController@storePermission']);
    Route::get('roles/permissions/{id}/revoke/{permission_id}', ['as'=>'roles.permissions.revoke', 'uses'=>'Admin\RolesController@revokePermission']);



    #Route::get('/home', 'HomeController@index');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

