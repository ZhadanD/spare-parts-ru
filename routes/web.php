<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
   Route::get('/', IndexController::class)->name('main');

   Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'verified', 'admin']], function () {
        Route::get('/', 'IndexController')->name('admin.main');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
   });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
