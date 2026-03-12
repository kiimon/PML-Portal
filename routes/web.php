<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamRegistrationController;
use App\Http\Controllers\MemberRegistrationController;

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

Route::get('/register-member', [MemberRegistrationController::class, 'index'])
    ->name('member.register');

Route::post('/register-team/store-team', [TeamRegistrationController::class, 'storeTeam'])
    ->name('team.store');

Route::post('/register-member/store-member', [MemberRegistrationController::class, 'store'])
    ->name('member.store');
