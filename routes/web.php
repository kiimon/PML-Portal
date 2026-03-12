<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamRegistrationController;
use App\Http\Controllers\MemberRegistrationController;
use App\Http\Controllers\HeroController;

Route::get('/', function () {
    return view('mlbb.home');
});

Route::get('/logos/{filename}', function ($filename) {
    $path = '/mnt/volume-sgp1-01/pml-logos/' . $filename;
    if (file_exists($path)) {
        return response()->file($path);
    }
    abort(404);
});

/*
|--------------------------------------------------------------------------
| MLBB Registration Pages
|--------------------------------------------------------------------------
*/

Route::get('/register-team', [TeamRegistrationController::class, 'index'])
    ->name('team.register');

Route::get('/register-team/success/{team}', [TeamRegistrationController::class, 'success'])
    ->name('team.success');

Route::post('/register-team/store-team', [TeamRegistrationController::class, 'storeTeam'])
    ->name('team.store');

Route::get('/register-member', [MemberRegistrationController::class, 'index'])
    ->name('member.register');

Route::post('/register-member/store-member', [MemberRegistrationController::class, 'store'])
    ->name('member.store');


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';