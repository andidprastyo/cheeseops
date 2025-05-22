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
        Schema::table('preparations', function (Blueprint $table) {
            $table->dropColumn('fat_content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('preparations', function (Blueprint $table) {
            $table->decimal('fat_content', 8, 2)->after('citric_acid_qty'); // %
        });
    }
};
