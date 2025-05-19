<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReserveController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/center', [HomeController::class, 'center'])->name('home.center');
Route::get('/car', [CarController::class, 'index'])->name('car.index');
Route::get('/car/display', [CarController::class, 'display'])->name('car.display');
Route::post('/reserve', [ReserveController::class, 'init'])->name('reserve.init');
Route::post('/reserve/store', [ReserveController::class, 'store'])->name('reserve.store');
Route::get('/reserve/show', [ReserveController::class, 'show'])->name('reserve.show');
