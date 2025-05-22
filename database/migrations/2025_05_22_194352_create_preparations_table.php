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
        Schema::create('preparations', function (Blueprint $table) {
            $table->id();
            $table->date('production_date');
            $table->decimal('milk_qty', 8, 2); // Liter
            $table->decimal('rennet_qty', 8, 2); // Gram
            $table->decimal('salt_qty', 8, 2); // Gram
            $table->decimal('citric_acid_qty', 8, 2); // Liter
            $table->decimal('fat_content', 8, 2); // %
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparations');
    }
};
