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
        Schema::create('lazada_lottery_prizes', function (Blueprint $table) {
            $table->id();
            $table->string('gift')->nullable();
            $table->string('lazada_lottery_id')->nullable();
            $table->tinyInteger('is_main')->default(0)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lazada_lottery_prizes');
    }
};
