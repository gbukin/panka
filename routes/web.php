<?php

use App\Http\Controllers\LazadaLotteryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = \App\Models\User::first();
    if (is_null($user)) {
        $user = new \App\Models\User();
        $user->name = 'admin';
        $user->email = 'a@a';
        $user->password = \Illuminate\Support\Facades\Hash::make('123');
        $user->email_verified_at = now();
        $user->save();
    }

    return view('index');
})->name('home');

Route::get('/lazada-lottery', [LazadaLotteryController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/lazada-lottery-content', [LazadaLotteryController::class, 'adminIndex'])
        ->name('lazada-lottery-table');
    Route::post('/lazada-lottery-content', [LazadaLotteryController::class, 'adminStore'])
        ->name('lazada-lottery-store');
});

require __DIR__.'/auth.php';
