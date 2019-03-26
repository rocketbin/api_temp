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
Route::post('test','TestController@index');
Route::get('colors','ColorController@index');
Route::group(['prefix' => 'uploads'], function () {
	Route::post('image', 'FileController@store');
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
