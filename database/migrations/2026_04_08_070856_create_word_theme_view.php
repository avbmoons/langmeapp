<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW word_theme_view AS
            SELECT
                w.id AS word_id,
                w.title AS word_title,
                t.id AS theme_id,
                t.title AS theme_title
            FROM words w
            JOIN theme_has_words thw ON w.id = thw.word_id
            JOIN themes t ON t.id = thw.theme_id
            ");
        // Schema::create('word_theme_view', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('word_theme_view');
        DB::statement("DROP VIEW IF EXISTS word_theme_view");
    }
};
