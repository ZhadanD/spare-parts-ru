<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SparePartsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
   Route::get('/', IndexController::class)->name('main');

   Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'verified', 'admin']], function () {
        Route::get('/', 'IndexController')->name('admin.main');

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
        });

        Route::group(['prefix' => 'spare-parts'], function () {
            Route::get('/', [SparePartsController::class, 'index'])->name('spare-parts.index');
            Route::post('/', [SparePartsController::class, 'store'])->name('spare-parts.store');
            Route::delete('/{spare_part}', [SparePartsController::class, 'destroy'])->name('spare-parts.destroy');
        });
   });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
