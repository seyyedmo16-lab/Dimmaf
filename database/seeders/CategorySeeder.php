<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'States',
            'General',
            'Life style',
            'Travel',
            'Design',
            'Creative',
            'Education',
            'Tourism',
            'Commodation',
            'Business',
            'Investment facilities'
        ];

        foreach ($categories as $categoryName) {
            Category::updateOrCreate(
                ['name' => $categoryName],
                ['name' => $categoryName]
            );
        }
    }
}
