<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\V1\AuthApiController;
use App\Http\Controllers\Api\V1\ProductApiController;
use App\Http\Controllers\Api\V1\ProductCategoryApiController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
    Route::post('login', [AuthApiController::class, 'login']);

    Route::group(['middleware' => ['auth:api']], function () {
        // ProductCategory
        Route::apiResource('product-category', ProductCategoryApiController::class);

        // Product 
        Route::apiResource('product', ProductApiController::class);
    });
});
