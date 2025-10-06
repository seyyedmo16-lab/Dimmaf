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
        Schema::create('infoes', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_fa')->nullable();
            $table->text('body_en')->nullable();
            $table->text('body_fa')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infoes');
    }
};
