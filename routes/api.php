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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['prefix' => 'v1/core', 'middleware' => ['bluecore']], function () {
    Route::post('/pub/{action}', '\App\Http\Controllers\Api\v1\BLUeCoreController@public');
    Route::post('/priv/{action}', '\App\Http\Controllers\Api\v1\BLUeCoreController@private')
        ->middleware('auth:api');
    Route::post('/{method}', '\App\Http\Controllers\Api\v1\BLUeCoreController@public');
    Route::post('/{method}/{action}', '\App\Http\Controllers\Api\v1\BLUeCoreController@public');
});
Route::post('getdatauji', '\App\Http\Controllers\Api\v1\BLUeCoreController@getDataUji');
