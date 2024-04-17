<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Hotel;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ChatController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/hotels', [HotelController::class, 'index']);
Route::get('/hotels/{id}', [HotelController::class, 'show']);
Route::post('/hotels', [HotelController::class, 'store']);
Route::put('/hotels/{id}', [HotelController::class, 'update']);
Route::delete('/hotels/{id}', [HotelController::class, 'destroy']);
Route::get('/messages', [ChatController::class, 'messages']);
Route::post('/send', [ChatController::class, 'send']);
