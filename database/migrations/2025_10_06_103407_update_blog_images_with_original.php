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
        // Update blog images with original images from @dimmaf project
        // Only update if image exists, otherwise leave empty
        
        // Yukon (YT) - state_id 3
        DB::table('blogs')->where('state_id', 3)->update([
            'image' => 'assets/img/blog/yukon.png'
        ]);
        
        // Northwest Territories (NT) - state_id 4
        DB::table('blogs')->where('state_id', 4)->update([
            'image' => 'assets/img/blog/northwestterritories.png'
        ]);
        
        // Nunavut (NU) - state_id 5
        DB::table('blogs')->where('state_id', 5)->update([
            'image' => 'assets/img/blog/nunavut.png'
        ]);
        
        // Quebec (QC) - state_id 6
        DB::table('blogs')->where('state_id', 6)->update([
            'image' => 'assets/img/blog/quebec.png'
        ]);
        
        // Newfoundland and Labrador (NL) - state_id 7
        DB::table('blogs')->where('state_id', 7)->update([
            'image' => 'assets/img/blog/newfoundland.png'
        ]);
        
        // New Brunswick (NB) - state_id 8
        DB::table('blogs')->where('state_id', 8)->update([
            'image' => 'assets/img/blog/newbrunswick.png'
        ]);
        
        // Nova Scotia (NS) - state_id 9
        DB::table('blogs')->where('state_id', 9)->update([
            'image' => 'assets/img/blog/novascotia.png'
        ]);
        
        // Prince Edward Island (PE) - state_id 10
        DB::table('blogs')->where('state_id', 10)->update([
            'image' => 'assets/img/blog/princeedward.png'
        ]);
        
        // Ontario (ON) - state_id 11
        DB::table('blogs')->where('state_id', 11)->update([
            'image' => 'assets/img/blog/ontario.png'
        ]);
        
        // Manitoba (MB) - state_id 12
        DB::table('blogs')->where('state_id', 12)->update([
            'image' => 'assets/img/blog/manitoba.png'
        ]);
        
        // Saskatchewan (SK) - state_id 13
        DB::table('blogs')->where('state_id', 13)->update([
            'image' => 'assets/img/blog/saskatchewan.png'
        ]);
        
        // Alberta (AB) - state_id 14
        DB::table('blogs')->where('state_id', 14)->update([
            'image' => 'assets/img/blog/alberta.png'
        ]);
        
        // British Columbia (BC) - state_id 15
        DB::table('blogs')->where('state_id', 15)->update([
            'image' => 'assets/img/blog/britishcolumbia.png'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Clear all blog images
        DB::table('blogs')->update(['image' => null]);
    }
};
