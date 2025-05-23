<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shutdowns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('preparation_id')->constrained()->onDelete('cascade');
            $table->decimal('cheese_weight', 8, 2); // in grams
            $table->decimal('whey_volume', 8, 2); // in liters
            $table->text('final_analysis');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shutdowns');
    }
}; 