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

Route::group(['prefix' => 'v1'],function(){
    //Manipulação de usuário
    Route::group(['prefix' => 'users'],function(){
        Route::post('/',['as' => 'users.store', 'uses' => 'UserController@store']);
        Route::get('/{agency}/{account}',['as' => 'users.information','uses' => 'UserController@information']);
    });

    //Manipulação de conta
    Route::group(['prefix' => 'account'],function(){
        Route::get('/balance/{agency}/{account}',['as' => 'account.balance', 'uses' => 'UserController@balance']);
        Route::put('/deposit',['as' => 'account.deposit', 'uses' => 'UserController@deposit']);
        Route::put('/withdraw',['as' => 'account.withdraw', 'uses' => 'UserController@withdraw']);
    });
});


