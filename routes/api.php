<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\NumberController;
use App\Http\Controllers\Api\NumberPreferenceController;
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

Route::apiResource('customers', CustomerController::class)->middleware('auth:sanctum');
Route::apiResource('customer/{idCustomer}/numbers', NumberController::class)->middleware(['auth:sanctum', 'customer.user']);
Route::apiResource('customer/{idCustomer}/number/{idNumber}/preferences', NumberPreferenceController::class)->middleware(['auth:sanctum', 'customer.user']);
