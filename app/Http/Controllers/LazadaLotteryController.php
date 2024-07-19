<?php

namespace App\Http\Controllers;

use App\Models\LazadaLottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LazadaLotteryController extends Controller
{
    public function index()
    {
        return view('lazada-lottery')
            ->with(['items' => LazadaLottery::all()->toArray()]);
    }

    public function adminIndex()
    {
        $lazadaLotteries = LazadaLottery::all();

        return Inertia::render('LazadaLottery/Index')->with(['items' => $lazadaLotteries]);
    }

    public function adminStore(Request $request)
    {
        $data = $request->request->all();

        for ($i = 0; $i < $data['amount']; $i++) {
            $lazadaLottery = new LazadaLottery();
            $lazadaLottery->order_date = $data['order_date'];
            $lazadaLottery->order_number = $data['order_number'];
            $lazadaLottery->customer_name = $data['customer_name'];
            $lazadaLottery->delivery_city = $data['delivery_city'];
            $lazadaLottery->prize_given = $data['prize_given'];

            $lazadaLottery->save();
        }

        return Redirect::route('lazada-lottery-table');
    }

    public function adminGive(LazadaLottery $prize)
    {
        if (!empty($prize) && !$prize->prize_given) {
            $prize->prize_given = true;
            $prize->save();
        }

        return response()->json();
    }
}
