<?php

use App\Http\Controllers\LotteryController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/redeem/{qr}', [PrizeController::class, 'redeem'])
    ->name('redeem');

Route::middleware(['auth'])->group(function () {
    Route::get('/lotteries', function () {
        return Inertia::render('Lottery');
    })->name('lotteries');

    /* -- API -- */
    Route::get('/lotteries/index', [LotteryController::class, 'index'])
        ->name('lotteries.index');
    /* -- === -- */

    Route::prefix('/lottery')->name('lottery.')->group(function () {
        Route::get('/create', [LotteryController::class, 'create'])
            ->name('create');

        Route::post('/lottery/create', [LotteryController::class, 'store'])
            ->name('store');

        Route::get('/show/{lottery}', [LotteryController::class, 'show'])
            ->name('show');

        Route::post('/draw-all/{lottery}', [LotteryController::class, 'draw'])
            ->name('draw.all');

        Route::post('/update/{lottery}', [LotteryController::class, 'update'])
            ->name('update');

        Route::post('/prize/update/{prize}', [PrizeController::class, 'update'])
            ->name('prize.update');

        Route::get('/prizes/edit/{lottery}', [LotteryController::class, 'prizeEdit'])
            ->name('prize.edit');

        Route::post('/prize/award/{prize}', [PrizeController::class, 'award'])
            ->name('prize.award');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
