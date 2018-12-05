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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('user', 'AuthController@user');


    Route::post('nav','NavController@store');
    Route::get('nav','API\NavController@index');

    Route::prefix('games/hhwqzzl')->namespace('API\HHWQZZL')->group(function(){
        Route::get('people_list','JueSeController@index');
        Route::post('add_jue_se','JueSeController@create');
        Route::post('add_word','WordController@create');
        Route::post('add_question','QuestionController@create');
    });
});
