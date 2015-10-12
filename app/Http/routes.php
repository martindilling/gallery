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


// Authentication
Route::group(['prefix' => '', 'namespace' => 'Auth'], function()
{
    // Authentication routes...
    Route::get( 'login',  ['as' => 'login', 'uses' => 'AuthController@getLogin']);
    Route::post('login',  ['as' => 'login.post', 'uses' => 'AuthController@postLogin']);
    Route::get( 'logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

    // Registration routes...
//    Route::get( 'register', ['as' => 'register', 'uses' => 'AuthController@getRegister']);
//    Route::post('register', ['as' => 'register.post', 'uses' => 'AuthController@postRegister']);
});


// Administration
Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    get(   'albums',                ['as' => 'admin.albums.index',   'uses' => 'AlbumController@index']);
    get(   'albums/create',         ['as' => 'admin.albums.create',  'uses' => 'AlbumController@create']);
    post(  'albums',                ['as' => 'admin.albums.store',   'uses' => 'AlbumController@store']);
    get(   'albums/{album}',        ['as' => 'admin.albums.show',    'uses' => 'AlbumController@show']);
    get(   'albums/{album}/edit',   ['as' => 'admin.albums.edit',    'uses' => 'AlbumController@edit']);
    post(  'albums/{album}',        ['as' => 'admin.albums.update',  'uses' => 'AlbumController@update']);
    post(  'albums/{album}/upload', ['as' => 'admin.albums.upload',  'uses' => 'AlbumController@upload']);
    delete('albums/{album}',        ['as' => 'admin.albums.destroy', 'uses' => 'AlbumController@destroy']);


    get(   'images/{image}/edit',   ['as' => 'admin.images.edit',    'uses' => 'ImageController@edit']);
    post(  'images/{image}',        ['as' => 'admin.images.update',  'uses' => 'ImageController@update']);
    delete('images/{image}',        ['as' => 'admin.images.destroy', 'uses' => 'ImageController@destroy']);
});


// Gallery
get('/',                         ['as' => 'gallery.albums', 'uses' => 'GalleryController@albums']);
get('{album_slug}',              ['as' => 'gallery.album',  'uses' => 'GalleryController@album']);
get('{album_slug}/{image_slug}', ['as' => 'gallery.image',  'uses' => 'GalleryController@image']);
