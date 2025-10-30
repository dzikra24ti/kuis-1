<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/buku', BukuController::class);

Route::get('dashboard',[DashboardController::class , 'index'])
        ->name('dashboard');
