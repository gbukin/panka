<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\UploadedFile;

class LotteryLink extends Model
{
    use HasTimestamps;

    protected $guarded = ['id'];

    public function lottery(): BelongsTo
    {
        return $this->belongsTo(Lottery::class);
    }

    public function prize(): HasOne
    {
        return $this->hasOne(Prize::class);
    }

    public static function getLinksFromExcel(UploadedFile|\Symfony\Component\HttpFoundation\File\UploadedFile $file): array
    {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getPathname());
        $list = $spreadsheet->getActiveSheet();

        $index = 1;
        $links = [];

        while ($link = $list->getCell('A' . $index)->getValue()) {
            $links[] = $link;
            $index++;
        }

        return $links;
    }
}
