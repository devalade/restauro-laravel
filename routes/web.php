<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatutTableController;
use App\Http\Controllers\TableController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
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
    Route::put('statut_tables/update/{statutTable}', [StatutTableController::class, 'update'])->name('statut_tables.update')->middleware('auth');
    Route::delete('statut_tables/destroy/{statutTable}', [StatutTableController::class, 'destroy'])->name('statut_tables.destroy');
    
    Route::get('tables', [TableController::class, 'index'])->name('tables.index');
    Route::get('tables/create', [TableController::class, 'create'])->name('tables.create');
    Route::post('tables/store', [TableController::class, 'store'])->name('tables.store');
    Route::get('tables/edit/{Table}', [TableController::class, 'edit'])->name('tables.edit');
    Route::put('tables/update/{Table}', [TableController::class, 'update'])->name('tables.update')->middleware('auth');
    Route::delete('tables/destroy/Table}', [TableController::class, 'destroy'])->name('tables.destroy');

});

require __DIR__.'/auth.php';
