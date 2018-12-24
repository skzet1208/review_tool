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

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

Route::middleware('auth:api')->group(function () {
    // Auth
    Route::post('/logout', 'Api\AuthController@logout');
    Route::get('/user', 'API\AuthController@getUser');

    // Ticket
    Route::post('/ticket/my/review', 'Api\TicketController@myReviewList');
    Route::post('/ticket/my/request', 'Api\TicketController@myRequestList');
});