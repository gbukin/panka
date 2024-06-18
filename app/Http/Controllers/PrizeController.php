<?php

namespace App\Http\Controllers;

use App\Models\LotteryLink;
use App\Models\Prize;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    public function update(Request $request, Prize $prize)
    {
        if ($request->post('field') === 'html_url') {
            $prize->html_url = $request->post('html_url');
        } else {
            $link = LotteryLink::where('url', $request->post('url'))->first();

            $prize->lottery_link_id = $link->id;
        }

        $prize->save();

        return response()->json();
    }

    public function redeem(string $url)
    {
        $link = LotteryLink::where('url', $url)->first();
        $prize = Prize::where('lottery_link_id', $link->id)->first();

        if ($prize) {
            echo 'You win: ' . $prize->name;
        } else {
            echo 'No prize, good luck in next time';
        }
    }
}
