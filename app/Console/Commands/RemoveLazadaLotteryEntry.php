<?php

namespace App\Console\Commands;

use App\Models\LazadaLottery;
use Illuminate\Console\Command;

class RemoveLazadaLotteryEntry extends Command
{
    protected $signature = 'lazada:remove-entry {id}';

    protected $description = 'Remove entry from lazada_lotteries table and reassign ID and AUTO_INCREMENT';

    public function handle()
    {
        if (!\Schema::hasTable('lazada_lotteries')) {
            $this->error('Table not found!');
            exit(1);
        }

        $entry = LazadaLottery::find($this->argument('id'));

        if (!$entry) {
            $this->error('Entry not found!');
            exit(1);
        }

        $entry->delete();
        $this->info('Entry removed!');

        $hasEntriesAfter = LazadaLottery::where('id', '>', $entry->id)
            ->count();

        if ($hasEntriesAfter) {
            $this->reassignId($entry->id);
        }

        $lastId = LazadaLottery::max('id');
        $this->info('max_id: ' . $lastId);
        $this->updateAutoIncrement($lastId + 1);
    }

    private function reassignId(int $id): void
    {
        \DB::update("UPDATE lazada_lotteries SET id = id - 1 WHERE id > ?", [$id]);
    }

    private function updateAutoIncrement(int $newValue): void
    {
        \DB::statement("ALTER SEQUENCE lazada_lotteries_id_seq RESTART WITH " . $newValue);
    }
}
