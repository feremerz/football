<?php

use Illuminate\Http\Request;

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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::namespace('Api')->group(function (){
    Route::post('login','UserController@login');

    Route::get('/teams', 'TeamController@list');
    Route::get('/team/{team}', 'TeamController@single');

    Route::get('/players', 'PlayerController@list');
    Route::get('/player/{player}', 'PlayerController@single');

    Route::middleware('auth:api')->group(function (){
        Route::post('team/update/{team}', 'TeamController@update')->middleware('isAdmin');
        Route::post('player/update/{player}', 'PlayerController@update')->middleware('isAdmin');
    });

});
