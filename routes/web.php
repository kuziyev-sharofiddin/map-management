<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UndiruvchiController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');


Route::middleware('auth.check')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/undiruvchilar', [UndiruvchiController::class, 'index'])->name('undiruvchilar.index');
    Route::get('/undiruvchilar/xarita', [UndiruvchiController::class, 'map'])->name('undiruvchilar.map');
    Route::post('/undiruvchilar/locations', [UndiruvchiController::class, 'getMultipleLocations'])->name('undiruvchilar.locations');

    Route::get('/masofalar', [App\Http\Controllers\MasofaController::class, 'index'])->name('masofalar.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
