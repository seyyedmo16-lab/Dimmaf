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
        // Update blog images with canadamap images (excluding cities folder)
        
        // New Brunswick (NB) - state_id 8
        DB::table('blogs')->where('state_id', 8)->update([
            'image' => 'assets/img/blog/newbrunswick.jpg'
        ]);
        
        // Newfoundland and Labrador (NL) - state_id 7
        DB::table('blogs')->where('state_id', 7)->update([
            'image' => 'assets/img/blog/newfoundland.webp'
        ]);
        
        // Northwest Territories (NT) - state_id 4
        DB::table('blogs')->where('state_id', 4)->update([
            'image' => 'assets/img/blog/northwestterritories.jpg'
        ]);
        
        // Nova Scotia (NS) - state_id 9
        DB::table('blogs')->where('state_id', 9)->update([
            'image' => 'assets/img/blog/novascotia.jpg'
        ]);
        
        // Nunavut (NU) - state_id 5
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
        DB::table('blogs')->whereIn('state_id', [4, 5, 7, 8, 9])->update(['image' => null]);
    }
};
