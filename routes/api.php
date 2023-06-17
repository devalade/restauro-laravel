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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// TODO: Créer la route pour créer un compte
// TODO: Créer la route pour se connecter
// TODO: Créer la route récuperer les catégories
// TODO: Créer la route récuperer les tables
// TODO: Créer la route pour réserver une table

Route::get('tables', function () {
    return response()->json([
        'data' =>  \App\Models\Table::with('statut_table')->get()
    ]);
})->name('tables.destroy');
