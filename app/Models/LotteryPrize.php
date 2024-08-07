<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LotteryPrize extends Model
{
    protected $guarded = ['id'];

    public const STATUS_AWARDED = 'Awarded';
    public const STATUS_NOT_AWARDED = 'Not awarded';
    public const STATUS_NOT_DRAWN = 'Not drawn';

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
                'prize_id' => $prize['id'],
                'lottery_id' => $lotteryID,
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
            $prize->status = LotteryPrize::STATUS_NOT_AWARDED;
            $prize->save();

            unset($lotteryLinkIDs[$key]);

            $lotteryLinkIDs = array_values($lotteryLinkIDs);
        }
    }
}
