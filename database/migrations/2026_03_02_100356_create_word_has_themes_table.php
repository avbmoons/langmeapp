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
        Schema::create('theme_has_words', function (Blueprint $table) {
            $table->foreignId('word_id')->references('id')->on('words')->cascadeOnDelete()->cascadeOnUpdate();            
            $table->foreignId('theme_id')->references('id')->on('themes')->cascadeOnDelete()->cascadeOnUpdate();
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
