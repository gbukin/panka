<?php

use App\Http\Controllers\LotteryController;
use App\Http\Controllers\LotteryPrizeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/tst', function () {
    $prize = \App\Models\Prize::find(4);

    return view('prize-page')->with(['prize_name' => $prize->name, 'prize_image' => Storage::url('prizes/' . $prize->image_name)]);
});

Route::view('/panka-lottery', 'panka-lottery');

Route::get('/redeem/{qr}', [LotteryPrizeController::class, 'redeem'])
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

        Route::post('/prize/update/{prize}', [LotteryPrizeController::class, 'update'])
            ->name('prize.update');

        Route::get('/prizes/edit/{lottery}', [LotteryController::class, 'prizeEdit'])
            ->name('prize.edit');

        Route::post('/prize/award/{prize}', [LotteryPrizeController::class, 'award'])
            ->name('prize.award');
    });

    Route::prefix('/prizes')->name('prizes.')->group(function () {
        Route::get('/', [\App\Http\Controllers\PrizeController::class, 'index'])
            ->name('index');

        Route::get('/create', [\App\Http\Controllers\PrizeController::class, 'create'])
            ->name('create');

        Route::post('/store', [\App\Http\Controllers\PrizeController::class, 'store'])
            ->name('store');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
