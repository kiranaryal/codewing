<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JsonController;

use Illuminate\Support\Facades\Route;

use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/github/callback', [App\Http\Controllers\Auth\RegisteredUserController::class, 'github']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/upload-json', [JsonController::class, 'uploadJson'])->name('upload.json');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
