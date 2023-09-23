<?php

use App\Http\Controllers\CustomerController;
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
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/customers/{id}/top-up', [CustomerController::class, 'topUpBalance']);
Route::post('/customers/{id}/transaction', [CustomerController::class, 'makeTransaction']);
Route::get('/promotions', [CustomerController::class, 'getPromotions']);
Route::get('/news', [CustomerController::class, 'getNews']);
