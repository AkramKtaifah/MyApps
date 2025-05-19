<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group(['middleware' => ['checkPassword', 'changeLanguage']], function(){

    Route::post('/get-main-categories', [CategoryController::class, 'index']);
    Route::post('/get-category-ById', [CategoryController::class, 'getCategoryById']);
    Route::post('/change-category-status', [CategoryController::class, 'changeCategoryStatus']);

    Route::post('/admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::group(['prefix' => 'admin', 'middleware' => 'auth.guard:admin'], function(){
        Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout']);
        Route::post('/profile', function(){
            return Auth::user();
        });
    });

    Route::post('/user/login', [\App\Http\Controllers\User\AuthController::class, 'login']);
    Route::group(['prefix' => 'user', 'middleware' => 'auth.guard:user'], function(){
        Route::post('/logout', [\App\Http\Controllers\User\AuthController::class, 'logout']);
        Route::post('/profile', function(){
            return Auth::user();
        });
    });
});
