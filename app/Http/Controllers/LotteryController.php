<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use App\Models\LotteryLink;
use App\Models\Prize;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class LotteryController extends Controller
{
    public function index(Request $request)
    {
        $lotteries = Lottery::query();

        if ($request->query('search')) {
            $lotteries->where('name', 'like', '%' . $request->query('search') . '%');
        }

        $lotteries->orderBy('id', 'desc');
        $lotteries->select(['id', 'name', 'created_at', 'ready']);
        return $lotteries->get()->transform(function (Lottery $lottery) {
            $cleanLottery = [];

            $cleanLottery['id'] = $lottery->id;
            $cleanLottery['name'] = $lottery->name;
            $cleanLottery['created'] = $lottery->created_at->format('d/m/Y');
            $cleanLottery['ready'] = $lottery->ready;

            return $cleanLottery;
        });
    }

    public function create()
    {
        return Inertia::render('Lottery/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255',
            'excel' => 'file|required|mimes:xls,xlsx',
            'prizes' => 'array|required'
        ]);

        $links = LotteryLink::getLinksFromExcel($request->file('excel'));

        $prizesAmount= 0;

        foreach ($request->post('prizes') as $prize) {
            $prizesAmount += $prize['amount'];
        }

        if (count($links) < $prizesAmount) {
            throw ValidationException::withMessages([
                'prizes' => 'Amount of prizes GREATER than QR-links',
                'excel' => 'Amount of QR-links LOWER than prizes'
            ]);
        }

        $lottery = new Lottery();
        $lottery->name = $validated['name'];
        $lottery->save();

        foreach ($links as &$link) {
            $link = ['url' => $link, 'lottery_id' => $lottery->id];
        }

        unset($link);

        LotteryLink::insert($links);

        Prize::createFromRequest($lottery->id, $request->post('prizes'));


        return redirect()->route('lotteries');
    }

    public function draw(Lottery $lottery)
    {
        if (!$lottery->is_draw) {
            $lottery->is_draw = true;
            $lottery->save();

            Prize::fillUrl($lottery->id);
        }

        return response()->json();
    }

    public function show(Lottery $lottery)
    {
        $prizes = $lottery->prizes()
            ->with('link')
            ->get()
            ->map(function (Prize $prize) {
                return [
                    'id' => $prize->id,
                    'name' => $prize->name,
                    'url' => $prize->link?->url,
                    'html' => $prize->html_url,
                    'status' => $prize->status,
                    'redeem' => $prize->redeem,
                    'redeem_at' => $prize->redeem ?
                        Carbon::createFromFormat('Y-m-d H:i:s', $prize->redeem_at)->format('d/m/Y') :
                        null,
                ];
            })
            ->values();


        $prizes->values();

        return Inertia::render('Lottery/LotteryContent')->with([
            'lottery' => $lottery,
            'prizes' => $prizes
        ]);
    }

    public function update(Lottery $lottery)
    {
        if (!$lottery->ready) {
            $lottery->ready = true;
            $lottery->save();
        }

        return redirect()->route('lotteries');
    }

    public function prizeEdit(Lottery $lottery)
    {
        $prizes = $lottery->prizes()
            ->with('link')
            ->get()
            ->map(function (Prize $prize) {
                return ['id' => $prize->id, 'name' => $prize->name, 'url' => $prize->link?->url, 'html' => $prize->html_url, 'status' => $prize->status];
            })
            ->values();

        return Inertia::render('Lottery/PrizesEdit')->with([
            'lottery' => $lottery,
            'prizes' => $prizes,
            'links' => $lottery->links->values()
        ]);
    }
}
