<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update blog images with beautiful province images (instead of maps)
        
        // New Brunswick (NB) - state_id 8 - Use the most beautiful image
        DB::table('blogs')->where('state_id', 8)->update([
            'image' => 'assets/img/blog/new-brunswick-3.jpg'
        ]);
        
        // Nova Scotia (NS) - state_id 9 - Beautiful coastal lighthouse image
        DB::table('blogs')->where('state_id', 9)->update([
            'image' => 'assets/img/blog/novascotia.jpg'
        ]);
        
        // Nunavut (NU) - state_id 5 - Beautiful snowy landscape
        DB::table('blogs')->where('state_id', 5)->update([
            'image' => 'assets/img/blog/nunavut.jpg'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to previous images if needed
        DB::table('blogs')->whereIn('state_id', [5, 8, 9])->update(['image' => null]);
    }
};
