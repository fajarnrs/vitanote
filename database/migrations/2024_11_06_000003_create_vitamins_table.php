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
        Schema::create('vitamins', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Vitamin A, B1, C, dll
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained('vitamin_categories')->cascadeOnDelete();
            $table->string('alternative_name')->nullable(); // Thiamine, Retinol, dll
            $table->text('description'); // Penjelasan singkat
            $table->longText('functions'); // Fungsi utama (bisa JSON atau HTML)
            $table->longText('food_sources'); // Sumber makanan
            $table->string('daily_need'); // AKG (Angka Kecukupan Gizi)
            $table->longText('deficiency_symptoms')->nullable(); // Gejala defisiensi
            $table->longText('toxicity_symptoms')->nullable(); // Gejala kelebihan
            $table->longText('interesting_facts')->nullable(); // Fakta menarik/sejarah
            $table->string('image_path')->nullable(); // Path gambar
            $table->boolean('is_popular')->default(false); // Untuk ditampilkan di beranda
            $table->integer('order')->default(0); // Urutan tampilan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vitamins');
    }
};
