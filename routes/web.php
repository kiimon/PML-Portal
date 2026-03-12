<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/heroes', [HeroController::class,'index'])->name('heroes.index');
    Route::post('/heroes', [HeroController::class,'store'])->name('heroes.store');
    Route::put('/heroes/{hero}', [HeroController::class,'update'])->name('heroes.update');

});

Route::get('/heroes/test', [HeroController::class, 'test'])
    ->middleware(['auth'])
    ->name('heroes.test');

require __DIR__.'/auth.php';
