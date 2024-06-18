<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lottery_links', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Lottery::class)
                ->cascadeOnDelete();
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lottery_links');
    }
};
