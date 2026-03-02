<?php

use App\Enums\Status;
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
        Schema::create('lexicons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pattern_id');
            $table->bigInteger('word_id');
            $table->string('translation', 100);
            $table->string('spell_base', 100);
            $table->string('spell_eng', 100)->nullable();
            $table->enum('status', [Status::all()]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lexicons');
    }
};
