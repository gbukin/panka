<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LazadaLotteryPrize extends Model
{
    protected $guarded = ['id'];

    public function lazadaLottery(): BelongsTo
    {
        return $this->belongsTo(LazadaLottery::class);
    }
}
