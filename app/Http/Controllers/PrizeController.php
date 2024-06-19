<?php

namespace App\Http\Controllers;

use App\Models\LotteryLink;
use App\Models\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
            $url = $prize->html_url;

            if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
                $url = 'https://' . $url;
            }

            if (str_starts_with($url, 'http://')) {
                $url = str_replace('http://', 'https://', $url);
            }

            return Redirect::to($url);
        }

        abort(404);
    }

    public function award(Request $request, Prize $prize)
    {
        if ($prize->status !== 'Awarded') {
            $prize->redeem = $request->post('redeemer');
            $prize->redeem_at = now();
            $prize->status = 'Awarded';
            $prize->save();
        }

        return response()->json();
    }
}
