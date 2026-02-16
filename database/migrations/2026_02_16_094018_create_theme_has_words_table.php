<?php

declare(strict_types=1);

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
        Schema::create('theme_has_words', function (Blueprint $table) {
            $table->foreignId('id_theme')->references('id')->on('themes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_word')->references('id')->on('words')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_has_words');
    }
};
