<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Api\v1\ProfilePictureController;
use App\Http\Controllers\CheckController;


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {   
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile-pictures', [ProfilePictureController::class, 'index'])->name('profile-pictures.index');
    
    // Checks Routes
    Route::get('/checks', [CheckController::class, 'index'])->name('checks.index');
    Route::get('/check-test', function () {
        return Inertia::render('Checks/Print', [
            'check' => [
                'payee' => 'TEST PAYEE',
                'amount' => 1000,
                // ... add other fields here if you didn't hardcode them in Vue
            ]
        ]);
    });
    Route::get('/checks/create', [CheckController::class, 'create'])->name('checks.create'); // Eto ang magpapakita ng form
    Route::post('/checks', [CheckController::class, 'store'])->name('checks.store');         // Eto ang magse-save ng data
    Route::get('/checks/{check}/print', [CheckController::class, 'show'])->name('checks.print');
});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
