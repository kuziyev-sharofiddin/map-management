<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/undiruvchilar', [\App\Http\Controllers\UndiruvchiController::class, 'index'])->name('undiruvchilar.index');
Route::get('/undiruvchilar/xarita', [\App\Http\Controllers\UndiruvchiController::class, 'map'])->name('undiruvchilar.map');
