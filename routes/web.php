<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


# Authentication
Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::get('sign-in', 'AuthController@signIn')->name('auth.signIn');
    Route::post('sign-in', 'AuthController@handleSignIn')->name('auth.handleSignIn');

    Route::get('sign-up', 'AuthController@signUp')->name('auth.signUp');
    Route::post('sign-up', 'AuthController@handleSignUp')->name('auth.handleSignUp');

    Route::get('sign-out', 'AuthController@handleSignOut')->name('auth.handleSignOut');
});


# Merchant
Route::group(['prefix' => 'merchant', 'namespace' => 'App\Http\Controllers\Merchant', 'middleware' => ['auth', 'merchant_user']], function () {

    # Merchant Create, Getting Started
    Route::get('create', 'MerchantController@create')->name('merchant.merchant.create');
    Route::post('create', 'MerchantController@store')->name('merchant.merchant.store');

    Route::group(['middleware' => ['merchant']], function () {

        # Dashboard
        Route::get('dashboard', 'DashboardController@index')->name('merchant.dashboard');

        # Programs
        Route::get('programs', 'ProgramController@index')->name('merchant.programs');

        Route::get('programs/create', 'ProgramController@create')->name('merchant.programs.create');
        Route::post('programs/create', 'ProgramController@store')->name('merchant.programs.store');

        # Campaign
        Route::get('campaigns', 'CampaignController@index')->name('merchant.campaigns');

        Route::get('campaigns/create', 'CampaignController@create')->name('merchant.campaigns.create');
        Route::post('campaigns/create', 'CampaignController@store')->name('merchant.campaigns.store');

    });

});

# Publisher
Route::group(['prefix' => 'publisher', 'namespace' => 'App\Http\Controllers\Publisher', 'middleware' => ['auth', 'publisher_user']], function () {

    # Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('publisher.dashboard');

    # Campaign
    Route::get('campaigns', 'CampaignController@index')->name('publisher.campaigns');

    # Merchant
    Route::get('merchants', 'MerchantController@index')->name('publisher.merchants');


});
