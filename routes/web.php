<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();

        return match ($user->role ?? 'client') {
            'admin' => redirect()->route('admin.users.index'), // Redirige l'admin vers la gestion des comptes
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

// Espace Administrateur (Gestion des comptes)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
});

Route::fallback(function () {
    return redirect('/');
});
