<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');
Route::get('/sites/{id}', [SiteController::class, 'show'])->name('sites.show');

Route::fallback(function () {
    return redirect('/');
});
