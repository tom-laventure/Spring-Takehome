<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\UserScoreController;

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

//api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\V1'], function () {
    Route::apiResource('user-score', UserScoreController::class);
    Route::get('/user-scores/grouped-by-score', [UserScoreController::class, 'groupedByScore']);
});