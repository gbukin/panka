<?php

namespace App\Http\Controllers;

use App\Models\LotteryLink;
use App\Models\LotteryPrize;
use App\Models\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class LotteryPrizeController extends Controller
{
    public function update(Request $request, LotteryPrize $prize)
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
        $lotteryLink = LotteryLink::where('url', $url)->first();
        $lotteryPrize = LotteryPrize::where('lottery_link_id', $lotteryLink->id)->first();

        if ($lotteryPrize) {
            if ($lotteryPrize->status === LotteryPrize::STATUS_AWARDED) {
                return \redirect()->route('home');
            }

            $prize = Prize::find($lotteryPrize->prize_id);
            $imageUrl = Storage::url('prizes/' . $prize->image_name);

            return view('prize-page')->with(['prize_name' => $prize->name, 'prize_image' => $imageUrl]);
        }

        abort(404);
    }

    public function award(Request $request, LotteryPrize $prize)
    {
        if ($prize->status !== 'Awarded') {
            $prize->redeem = $request->post('redeemer');
            $prize->redeem_at = now();
            $prize->status = LotteryPrize::STATUS_AWARDED;
            $prize->save();
        }

        return response()->json();
    }
}
