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
        Schema::create('lang_has_tasks', function (Blueprint $table) {
            $table->foreignId('lang_id')->references('id')->on('langs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('task_id')->references('id')->on('tasks')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lang_has_tasks');
    }
};
