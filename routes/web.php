<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RatesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'showing'])->name('index');

Route::post('saveMe', [RatesController::class, 'saveMe']);

Route::prefix('admin/home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::resource('rates', RatesController::class);
});