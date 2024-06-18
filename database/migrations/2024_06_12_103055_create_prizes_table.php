<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prizes', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Lottery::class)
                ->cascadeOnDelete();

            $table->string('name');

            $table->foreignIdFor(\App\Models\LotteryLink::class)
                ->nullable();

            $table->string('redeem')->nullable();
            $table->dateTime('redeem_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prizes');
    }
};
