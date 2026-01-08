<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});

//AUTH
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//DASBOARD
Route::middleware('auth')->group(function () {

    Route::get('/pejabat/dashboard', function () {
        return view('dashboard.pejabat');
    })->middleware('pejabat');

    Route::get('/pegawai/dashboard', function () {
        return view('dashboard.pegawai');
    });
});