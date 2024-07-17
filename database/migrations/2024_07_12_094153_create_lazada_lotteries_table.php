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
        Schema::create('lazada_lotteries', function (Blueprint $table) {
            $table->id();
            $table->date('order_date')->nullable(false);
            $table->string('order_number')->nullable(false);
            $table->string('customer_name')->nullable(false);
            $table->string('delivery_city')->nullable(false);
            $table->boolean('prize_given')->nullable(false)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lazada_lotteries');
    }
};
