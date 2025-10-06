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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_id'); // Changed from integer to unsignedBigInteger for Laravel 12
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->text('answer')->nullable();
            $table->timestamps();
            
            // Add foreign key constraint
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
