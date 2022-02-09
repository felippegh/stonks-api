<?php

use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/users', [UserController::class, 'store']);

    Route::get('/stock', [StockController::class, 'getCurrentStockPrice'])->name('api.stock.price');

    Route::get('/history', [StockController::class, 'getUserHistory'])->name('api.user.history');
});

Route::post('/users/login', [UserController::class, 'login'])->name('api.users.login');

