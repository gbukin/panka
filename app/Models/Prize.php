<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prize extends Model
{
    protected $guarded = ['id'];

    public function lottery(): BelongsTo
    {
        return $this->belongsTo(Lottery::class);
    }

    public function link(): BelongsTo
    {
        return $this->belongsTo(LotteryLink::class, 'lottery_link_id', 'id');
    }

    public static function createFromRequest(int $lotteryID, array $data): void
    {
        foreach ($data as $prize) {
            $fields = [
                'name' => $prize['name'],
                'lottery_id' => $lotteryID,
                'html_url' => $prize['html_url'],
            ];

            $populatedPrizes = array_fill(0, $prize['amount'], $fields);

            self::insert($populatedPrizes);
        }
    }

    public static function fillUrl(int $lotteryID): void
    {
        $lotteryLinkIDs = LotteryLink::where('lottery_id', $lotteryID)
            ->pluck('id')
            ->toArray();

        $prizes = self::where('lottery_id', $lotteryID)
            ->get()->shuffle();

        foreach ($prizes as $prize) {
            if (count($lotteryLinkIDs) > 0) {
                $key = random_int(0, count($lotteryLinkIDs) - 1);
            } else {
                break;
            }

            $prize->lottery_link_id = $lotteryLinkIDs[$key];
            $prize->status = 'Not awarded';
            $prize->save();

            unset($lotteryLinkIDs[$key]);

            $lotteryLinkIDs = array_values($lotteryLinkIDs);
        }
    }
}
