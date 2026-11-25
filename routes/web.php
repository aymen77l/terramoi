<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();

        return match ($user->role ?? 'client') {
            'admin' => redirect()->route('admin.dashboard'),
            'gestionnaire' => redirect()->route('gestionnaire.dashboard'),
            default => redirect()->route('sites.index'),
        };
    }

    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');
    Route::get('/sites/{id}', [SiteController::class, 'show'])->name('sites.show');
    Route::get('/sites/{site_id}/{parcelle_id}', [SiteController::class, 'showParcelle'])->name('sites.parcelles.show');
});

Route::fallback(function () {
    return redirect('/');
});
