<?php

namespace App\Http\Controllers;

use App\Models\LazadaLottery;
use App\Models\LazadaLotteryPrize;
use App\Models\Lottery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LazadaLotteryController extends Controller
{
    public function index()
    {
        $data = [
            'items' => LazadaLottery::orderBy('id')->get()->toArray()
        ];

        if (LazadaLotteryPrize::where('lazada_lottery_id', null)->count() === 0) {
            $data['lazada_prizes'] = LazadaLotteryPrize::with('lazadaLottery')->orderByDesc('id')->get()->toArray();
        }

        return view('lazada-lottery')
            ->with($data);
    }

    public function adminIndex()
    {
        $lazadaLotteries = LazadaLottery::orderBy('id')->get()->toArray();
        foreach ($lazadaLotteries as &$lazadaLottery) {
            $lazadaLottery['prize_given'] = (bool)$lazadaLottery['prize_given'];
        }
        unset($lazadaLottery);

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

    public function adminEdit(LazadaLottery $prize)
    {
        if (\Auth::check() && \Auth::user()->role !== User::ROLE_SUPER_ADMIN) {
            abort(404);
        }

        return Inertia::render('LazadaLottery/Edit')->with(['prize' => $prize]);
    }

    public function adminUpdate(Request $request)
    {
        if (\Auth::check() && \Auth::user()->role !== User::ROLE_SUPER_ADMIN) {
            abort(404);
        }

        $data = $request->request->all();

        $prize = LazadaLottery::find($data['id']);

        if (is_null($prize)) {
            abort(404);
        }

        $prize->order_date = $data['order_date'];
        $prize->order_number = $data['order_number'];
        $prize->customer_name = $data['customer_name'];
        $prize->delivery_city = $data['delivery_city'];
        $prize->phone = $data['phone'];
        $prize->save();

        return Redirect::route('lazada-lottery-table');
    }

    public function adminPrizesIndex()
    {
        $items = LazadaLotteryPrize::with('lazadaLottery')
            ->orderBy('id')
            ->get();

        return Inertia::render('LazadaLottery/Prizes/Index')
            ->with(['items' => $items]);
    }

    public function adminPrizesUpdate(Request $request)
    {
        $prizeID = $request->post('id');
        $lazadaID = $request->post('lazada_id');

        if (is_null(LazadaLottery::find($lazadaID))) {
            abort(404, 'Lazada Lottery ID not found');
        }

        $prize = LazadaLotteryPrize::find($prizeID);

        if (is_null($prize)) {
            abort(400);
        }

        if (LazadaLotteryPrize::where('lazada_lottery_id', $lazadaID)->exists()) {
            abort(400, 'Lazada Lottery ID already in use');
        }

        $prize->lazada_lottery_id = $lazadaID;
        $prize->save();

        return response()->json();
    }
}
