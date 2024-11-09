<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('lazada_lottery_prizes')) {
            $items = array_fill(0, 30, ['gift' => 'Monthly supply of Panka snacks (30) packs', 'is_main' => 0]);

            array_push(
                $items,
                ['gift' => 'Xiaomi Redmi Watch 4', 'is_main' => 1],
                ['gift' => 'Xiaomi Vacuum Cleaner G20 Lite', 'is_main' => 1],
                ['gift' => 'AirPods 3nd generation (2)', 'is_main' => 1],
                ['gift' => 'AirPods 3nd generation (1)', 'is_main' => 1],
                ['gift' => 'AirPods Pro 2nd generation', 'is_main' => 1],
                ['gift' => 'Harman/Kardon Onyx Studio 7', 'is_main' => 1],
                ['gift' => 'Xiaomi TV A Pro 4K «43»', 'is_main' => 1],
                ['gift' => 'iPhone 15', 'is_main' => 1],
            );

            \App\Models\LazadaLotteryPrize::insert($items);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('lazada_lottery_prizes')
            ->truncate();
    }
};
