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
    Route::get('create', 'MerchantController@create')->name('merchant.merchants.create');
    Route::post('create', 'MerchantController@store')->name('merchant.merchants.store');

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

        # Partner
        Route::get('partners', 'PartnerController@index')->name('merchant.partners');
        Route::get('partners/join-requests', 'PartnerController@joinRequests')->name('merchant.partners.joinRequests');
        Route::post('partners/join-requests', 'PartnerController@handleJoinRequests')->name('merchant.partners.handleJoinRequests');

        # Settings
        Route::group(['prefix' => 'profile'], function () {

            # Profile
            Route::get('/', 'ProfileController@index')->name('merchant.profile.index');
            Route::post('profile/update-profile', 'ProfileController@handleUpdateProfile')->name('merchant.profile.handleUpdateProfile');

            Route::get('security', 'ProfileController@security')->name('merchant.profile.security');
            Route::post('security/update-password', 'ProfileController@handleUpdatePassword')->name('merchant.profile.handleUpdatePassword');

            Route::get('notification', 'ProfileController@notification')->name('merchant.profile.notification');

        });

        # Merchant Edit
        Route::get('merchants/edit', 'MerchantController@edit')->name('merchant.merchants.edit');
        Route::post('merchants/edit', 'MerchantController@update')->name('merchant.merchants.update');

    });

});

# Partner
Route::group(['prefix' => 'partner', 'namespace' => 'App\Http\Controllers\Partner', 'middleware' => ['auth', 'partner_user']], function () {

    Route::get('profile/create-partner', 'ProfileController@createPartner')->name('partner.profile.createPartner');
    Route::post('profile/create-partner', 'ProfileController@handleCreatePartner')->name('partner.profile.handleCreatePartner');

    Route::group(['middleware' => ['partner']], function () {
        # Dashboard
        Route::get('dashboard', 'DashboardController@index')->name('partner.dashboard');

        # Campaign
        Route::get('campaigns', 'CampaignController@index')->name('partner.campaigns');

        # Merchant
        Route::get('merchants', 'MerchantController@index')->name('partner.merchants');
        Route::post('merchants/join-request', 'MerchantController@handleJoinRequest')->name('partner.merchants.handleJoinRequest');

        # Settings
        Route::group(['prefix' => 'profile'], function () {

            # Profile
            Route::get('/', 'ProfileController@index')->name('partner.profile.index');
            Route::post('profile/update-profile', 'ProfileController@handleUpdateProfile')->name('partner.profile.handleUpdateProfile');

            Route::get('partner', 'ProfileController@partner')->name('partner.profile.partner');
            Route::post('partner/update-partner', 'ProfileController@handleUpdatePartner')->name('partner.profile.handleUpdatePartner');

            Route::get('security', 'ProfileController@security')->name('partner.profile.security');
            Route::post('security/update-password', 'ProfileController@handleUpdatePassword')->name('partner.profile.handleUpdatePassword');

            Route::get('notification', 'ProfileController@notification')->name('partner.profile.notification');

        });
    });
});
