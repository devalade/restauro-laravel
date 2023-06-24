<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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





Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/categories', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::get('/table', [\App\Http\Controllers\Api\TableController::class, 'index']);
    Route::get('/commandes', [\App\Http\Controllers\Api\TableController::class, 'index']);
    Route::get('/reservations', [\App\Http\Controllers\Api\ReservationController::class, 'index']);
});

Route::get('tables', function () {
    return response()->json([
        'data' =>  \App\Models\Table::with('statut_table')->get()
    ]);
});
