<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;

class Lottery extends Model
{
    use HasTimestamps;

    public function links(): HasMany
    {
        return $this->hasMany(LotteryLink::class);
    }

    public function prizes(): HasMany
    {
        return $this->hasMany(LotteryPrize::class);
    }
}
