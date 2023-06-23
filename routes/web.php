<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServeurController;
use App\Http\Controllers\StatutTableController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/restaurant', [ProfileController::class, 'updateRestaurant'])->name('profile.restaurant.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('categories', [CategorieController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategorieController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategorieController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{categorie}', [CategorieController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{categorie}', [CategorieController::class, 'update'])->name('categories.update')->middleware('auth');
    Route::delete('categories/destroy/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

    Route::get('statut_tables', [StatutTableController::class, 'index'])->name('statut_tables.index');
    Route::get('statut_tables/create', [StatutTableController::class, 'create'])->name('statut_tables.create');
    Route::post('statut_tables/store', [StatutTableController::class, 'store'])->name('statut_tables.store');
    Route::get('statut_tables/edit/{statutTable}', [StatutTableController::class, 'edit'])->name('statut_tables.edit');
    Route::put('statut_tables/update/{statutTable}', [StatutTableController::class, 'update'])->name('statut_tables.update');
    Route::delete('statut_tables/destroy/{statutTable}', [StatutTableController::class, 'destroy'])->name('statut_tables.destroy');

    Route::get('tables', [TableController::class, 'index'])->name('tables.index');
    Route::post('tables', [TableController::class, 'store'])->name('tables.store');
    Route::get('tables/create', [TableController::class, 'create'])->name('tables.create');
    Route::get('tables/edit/{table}', [TableController::class, 'edit'])->name('tables.edit');
    Route::put('tables/update/{table}', [TableController::class, 'update'])->name('tables.update');
    Route::delete('tables/destroy/{table}', [TableController::class, 'destroy'])->name('tables.destroy');

    Route::get('serveurs', [ServeurController::class, 'index'])->name('serveurs.index');
    Route::post('serveurs', [ServeurController::class, 'store'])->name('serveurs.store');
    Route::get('serveurs/create', [ServeurController::class, 'create'])->name('serveurs.create');
    Route::get('serveurs/edit/{serveur}', [ServeurController::class, 'edit'])->name('serveurs.edit');
    Route::put('serveurs/update/{serveur}', [ServeurController::class, 'update'])->name('serveurs.update');
    Route::delete('serveurs/destroy/{serveur}', [ServeurController::class, 'destroy'])->name('serveurs.destroy');

    Route::get('plats', [PlatController::class, 'index'])->name('plats.index');
    Route::post('plats', [PlatController::class, 'store'])->name('plats.store');
    Route::get('plats/create', [PlatController::class, 'create'])->name('plats.create');
    Route::get('plats/edit/{serveur}', [PlatController::class, 'edit'])->name('plats.edit');
    Route::put('plats/update/{serveur}', [PlatController::class, 'update'])->name('plats.update');
    Route::delete('plats/destroy/{serveur}', [PlatController::class, 'destroy'])->name('plats.destroy');

    Route::get('/commandes', [\App\Http\Controllers\CommandeController::class, 'index'])->name('commandes.index');
    Route::put('/commandes/{commande}', [\App\Http\Controllers\CommandeController::class, 'update'])->name('commandes.update');
});

require __DIR__.'/auth.php';
