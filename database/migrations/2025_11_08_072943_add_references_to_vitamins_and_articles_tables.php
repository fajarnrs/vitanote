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
        Schema::table('vitamins', function (Blueprint $table) {
            $table->json('references')->nullable()->after('interesting_facts');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->json('references')->nullable()->after('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vitamins', function (Blueprint $table) {
            $table->dropColumn('references');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('references');
        });
    }
};
