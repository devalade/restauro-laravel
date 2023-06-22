<?php

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





// TODO: Créer la route pour créer un compte
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
// TODO: Créer la route pour se connecter
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
// TODO: Créer la route récuperer les catégories
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

// TODO: Créer la route récuperer les tables
    Route::get('/categories', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
// TODO: Créer la route pour réserver une table
    Route::get('/table', [\App\Http\Controllers\Api\TableController::class, 'index']);
});

Route::get('tables', function () {
    return response()->json([
        'data' =>  \App\Models\Table::with('statut_table')->get()
    ]);
});
