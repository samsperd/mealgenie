<?php

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

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', 'Auth\UserController@current');

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');
    Route::post('/requests', 'OperationsController@getRequests')->name('requests');    
    Route::post('/historypack', 'OperationsController@historyTab')->name('histories');
    Route::post('submitcart', 'OperationsController@addToCart');
    Route::post('/payed', 'OperationsController@payed')->name('paid');
    Route::post('/workerhome/{slug}', 'OperationsController@getWorkerHome')->name('workerhome');
    Route::post('/workermenu/{slug}', 'OperationsController@getWorkerMenu')->name('workermenu');
    Route::post('/togglerestaurant', 'OperationsController@toggleRestaurant')->name('togglerestaurant');
    Route::post('/togglefood', 'OperationsController@toggleFood')->name('togglefood');
    Route::post('/toggleaddon', 'OperationsController@toggleAddon')->name('toggleaddon');
    Route::post('/toggle', 'OperationsController@toggle')->name('toggle');
    Route::post('/orderaccepted', 'OperationsController@toggleAccept')->name('toggleaccept');
    Route::post('/ordercompleted', 'OperationsController@toggleComplete')->name('togglecomplete');
    Route::post('/ordercompleted', 'OperationsController@toggleComplete')->name('togglecomplete');
    Route::post('/ordercompleted', 'OperationsController@toggleComplete')->name('togglecomplete');
    Route::post('/workerhistory', 'OperationsController@workerHistory')->name('workerhistory');
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});
Route::post('schools', 'OperationsController@schoolIndex')->name('schools');
Route::post('/cafetarias/{slug}', 'OperationsController@getRestaurants')->name('cafetarias');
Route::post('/cafetaria/{slug}/foods', 'OperationsController@getFoods')->name('cafetaria');
Route::post('couponcheck', 'OperationsController@couponGet')->name('coupon');
Route::post('/coupons', 'OperationsController@coupons')->name('coupons');
Route::post('togglevalue', 'OperationsController@toggleValue')->name('togglevalue');
