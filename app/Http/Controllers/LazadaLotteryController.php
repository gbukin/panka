<?php

namespace App\Http\Controllers;

use App\Models\LazadaLottery;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LazadaLotteryController extends Controller
{
    public function index()
    {
        return Inertia::render('LazadaLottery/Index')->with(['items' => LazadaLottery::all()]);
    }
}
