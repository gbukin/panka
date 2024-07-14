<?php

use App\Http\Controllers\LazadaLotteryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/lazada-lottery', [LazadaLotteryController::class, 'index'])
    ->name('lazada-lottery');

Route::middleware(['auth'])->group(function () {
    Route::get('/lazada-lottery-content', [LazadaLotteryController::class, 'adminIndex'])
        ->name('lazada-lottery-table');
    Route::post('/lazada-lottery-content', [LazadaLotteryController::class, 'adminStore'])
        ->name('lazada-lottery-store');
});

require __DIR__.'/auth.php';
