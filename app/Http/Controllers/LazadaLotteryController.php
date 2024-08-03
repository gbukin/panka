<?php

namespace App\Http\Controllers;

use App\Models\LazadaLottery;
use App\Models\Lottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LazadaLotteryController extends Controller
{
    public function index()
    {
        return view('lazada-lottery')
            ->with(['items' => LazadaLottery::orderBy('id')->get()->toArray()]);
    }

    public function adminIndex()
    {
        $lazadaLotteries = LazadaLottery::orderBy('id')->get()->toArray();

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
            $lazadaLottery->phone = $data['phone'];
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
