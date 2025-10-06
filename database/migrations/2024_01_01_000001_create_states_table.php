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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->boolean('is_active')->default(true);
            $table->string('name');
            $table->integer('investment_facilities');
            $table->integer('education_rank');
            $table->integer('tourism');
            $table->integer('jobs_and_business');
            $table->integer('accommodation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
