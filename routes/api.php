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

Route::GET('kota', 'ApiController@Kota');
Route::GET('kecamatan/{id?}', 'ApiController@Kecamatan');
Route::GET('spesialis', 'ApiController@Spesialis');
Route::GET('dokter/{id?}', 'ApiController@Dokter');
Route::GET('rujukan', 'ApiController@Rujukan');
