<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'merchant', 'namespace' => 'App\Http\Controllers\API'], function () {

    # Merchant
    Route::group(['prefix' => 'merchant', 'namespace' => 'Merchant',
//        'middleware' => ['auth', 'merchant_user']
    ], function () {

        Route::post('tracking', 'TrackingController@sendEvent');

    });
});
