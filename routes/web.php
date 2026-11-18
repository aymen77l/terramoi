<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');

Route::get('/sites/{id}', [SiteController::class, 'show'])->name('sites.show');

Route::get('/sites/{site_id}/{parcelle_id}', [SiteController::class, 'showParcelle'])->name('sites.parcelles.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::fallback(function () {
    return redirect('/');
});
