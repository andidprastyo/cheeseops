<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('preparation_id')->constrained()->onDelete('cascade');
            $table->decimal('temperature', 5, 2);
            $table->text('analysis');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('startups');
    }
}; 