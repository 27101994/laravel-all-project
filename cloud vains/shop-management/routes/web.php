<?php

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

// routes/web.php


use App\Http\Controllers\ShopController;

Auth::routes();




// Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
// Route::get('/shops/create', [ShopController::class, 'create'])->name('shops.create');
// Route::post('/shops', [ShopController::class, 'store'])->name('shops.store');
// Route::get('/shops/{shop}/edit', [ShopController::class, 'edit'])->name('shops.edit');
// Route::put('/shops/{shop}', [ShopController::class, 'update'])->name('shops.update');
// Route::delete('/shops/{shop}', [ShopController::class, 'destroy'])->name('shops.destroy');
// Route::post('/shops/{shop}/change-status', [ShopController::class, 'changeStatus'])->name('shops.changeStatus');



Route::middleware(['auth'])->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shops.index');
    Route::get('/shops/create', [ShopController::class, 'create'])->name('shops.create');
    Route::post('/shops', [ShopController::class, 'store'])->name('shops.store');
    Route::get('/shops/{shop}/edit', [ShopController::class, 'edit'])->name('shops.edit');
    Route::put('/shops/{shop}', [ShopController::class, 'update'])->name('shops.update');
    Route::delete('/shops/{shop}', [ShopController::class, 'destroy'])->name('shops.destroy');
    Route::post('/shops/{shop}/change-status', [ShopController::class, 'changeStatus'])->name('shops.changeStatus');
});




