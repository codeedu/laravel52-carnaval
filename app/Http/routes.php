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

    Route::get('permissions', ['as'=>'permissions.index', 'uses'=>'Admin\PermissionsController@index']);
    Route::get('permissions/new', ['as'=>'permissions.create', 'uses'=>'Admin\PermissionsController@create']);
    Route::post('permissions/store', ['as'=>'permissions.store', 'uses'=>'Admin\PermissionsController@store']);
    Route::get('permissions/edit/{id}', ['as'=>'permissions.edit', 'uses'=>'Admin\PermissionsController@edit']);
    Route::put('permissions/update/{id}', ['as'=>'permissions.update', 'uses'=>'Admin\PermissionsController@update']);
    Route::get('permissions/destroy/{id}', ['as'=>'permissions.destroy', 'uses'=>'Admin\PermissionsController@destroy']);

    Route::get('users', ['as'=>'users.index', 'uses'=>'Admin\UsersController@index']);
    Route::get('users/new', ['as'=>'users.create', 'uses'=>'Admin\UsersController@create']);
    Route::post('users/store', ['as'=>'users.store', 'uses'=>'Admin\UsersController@store']);
    Route::get('users/edit/{id}', ['as'=>'users.edit', 'uses'=>'Admin\UsersController@edit']);
    Route::put('users/update/{id}', ['as'=>'users.update', 'uses'=>'Admin\UsersController@update']);
    Route::get('users/destroy/{id}', ['as'=>'users.destroy', 'uses'=>'Admin\UsersController@destroy']);
    Route::get('users/roles/{id}', ['as'=>'users.roles', 'uses'=>'Admin\UsersController@roles']);
    Route::post('users/roles/{id}/store', ['as'=>'users.roles.store', 'uses'=>'Admin\UsersController@storeRole']);
    Route::get('users/roles/{id}/revoke/{role_id}', ['as'=>'users.roles.revoke', 'uses'=>'Admin\UsersController@revokeRole']);

    Route::get('categories', ['as'=>'categories.index', 'uses'=>'Admin\CategoriesController@index']);
    Route::get('categories/new', ['as'=>'categories.create', 'uses'=>'Admin\CategoriesController@create']);
    Route::post('categories/store', ['as'=>'categories.store', 'uses'=>'Admin\CategoriesController@store']);
    Route::get('categories/edit/{id}', ['as'=>'categories.edit', 'uses'=>'Admin\CategoriesController@edit']);
    Route::put('categories/update/{id}', ['as'=>'categories.update', 'uses'=>'Admin\CategoriesController@update']);
    Route::get('categories/destroy/{id}', ['as'=>'categories.destroy', 'uses'=>'Admin\CategoriesController@destroy']);

    Route::get('books', ['as'=>'books.index', 'uses'=>'Admin\BooksController@index']);
    Route::get('books/new', ['as'=>'books.create', 'uses'=>'Admin\BooksController@create']);
    Route::post('books/store', ['as'=>'books.store', 'uses'=>'Admin\BooksController@store']);
    Route::get('books/edit/{id}', ['as'=>'books.edit', 'uses'=>'Admin\BooksController@edit']);
    Route::put('books/update/{id}', ['as'=>'books.update', 'uses'=>'Admin\BooksController@update']);
    Route::get('books/destroy/{id}', ['as'=>'books.destroy', 'uses'=>'Admin\BooksController@destroy']);
    Route::get('books/cover/{id}', ['as'=>'books.cover', 'uses'=>'Admin\BooksController@cover']);
    Route::post('books/cover/{id}', ['as'=>'books.cover.store', 'uses'=>'Admin\BooksController@coverStore']);
    Route::get('books/export/{id}', ['as'=>'books.export', 'uses'=>'Admin\BooksController@export']);


    Route::group(['prefix'=>'books', 'as'=>'books.'], function () {
        Route::get('{id}/chapters', ['as'=>'chapters.index', 'uses'=>'Admin\ChaptersController@index']);
        Route::get('{id}/chapters/create', ['as'=>'chapters.create', 'uses'=>'Admin\ChaptersController@create']);
        Route::post('{id}/chapters/store', ['as'=>'chapters.store', 'uses'=>'Admin\ChaptersController@store']);
        Route::get('{id}/chapters/edit/{chapter_id}', ['as'=>'chapters.edit', 'uses'=>'Admin\ChaptersController@edit']);
        Route::put('{id}/chapters/update/{chapter_id}', ['as'=>'chapters.update', 'uses'=>'Admin\ChaptersController@update']);
        Route::get('{id}/chapters/destroy/{chapter_id}', ['as'=>'chapters.destroy', 'uses'=>'Admin\ChaptersController@destroy']);
    });
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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['web']], function () {
    //
});

