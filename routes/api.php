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

Route::get('orders','FoodRecordController@index');
Route::get('orders/{order_id}','FoodRecordController@show');
Route::post('order/{order_id}','FoodRecordController@store');
// Route::put('order/{order_id}','FoodRecordController@update');
//Route::get('order/{order_id}','FoodRecordController@destroy');
