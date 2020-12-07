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



Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::get('pages/find', 'PageController@find');

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('/test', function () {
        return 'middleware passed';
    });

    Route::resource('blocks', 'PostController', [
        'except'    => ['create', 'edit']
    ]);

    Route::resource('pages', 'PageController', [
        'except'    => ['create', 'edit']
    ]);

    Route::resource('media', 'ImageController', [
        'except'    => ['create', 'edit']
    ]);

    Route::resource('users', 'UserController', [
        'except'    => ['create', 'edit', 'update']
    ]);

    Route::get('header', 'HeaderItemController@index');
    Route::get('footer', 'FooterController@show');
    Route::put('footer', 'FooterController@update');

    Route::post('header', 'HeaderItemController@sync');
});
