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

//Route::get('/', 'WelcomeController@index');
//
//Route::get('home', 'HomeController@index');
//Route::get('upload', ['as' => 'upload.get', 'uses' => 'UploadController@get']);
//Route::post('upload', ['as' => 'upload.post', 'uses' => 'UploadController@post']);



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
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

get('/',                           ['as' => 'gallery.albums', 'uses' => 'GalleryController@albums']);
get('{album_folder}',              ['as' => 'gallery.album',  'uses' => 'GalleryController@album']);
get('{album_folder}/{image_file}', ['as' => 'gallery.image',  'uses' => 'GalleryController@image']);



Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
