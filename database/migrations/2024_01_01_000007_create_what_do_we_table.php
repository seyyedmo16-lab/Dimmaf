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
        Schema::create('what_do_we', function (Blueprint $table) {
            $table->id();
            $table->string('title_en', 250)->nullable();
            $table->string('title_fa', 250)->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fa')->nullable();
            $table->longText('body_en')->nullable();
            $table->longText('body_fa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('what_do_we');
    }
};
