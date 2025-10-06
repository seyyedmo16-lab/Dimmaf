<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            [
                'symbol' => 'en',
                'name' => 'general-en',
                'is_active' => false,
                'investment_facilities' => 0,
                'education_rank' => 0,
                'tourism' => 0,
                'jobs_and_business' => 0,
                'accommodation' => 0
            ],
            [
                'symbol' => 'fa',
                'name' => 'general-fa',
                'is_active' => false,
                'investment_facilities' => 0,
                'education_rank' => 0,
                'tourism' => 0,
                'jobs_and_business' => 0,
                'accommodation' => 0
            ],
            [
                'symbol' => 'yt',
                'name' => 'Yukon',
                'is_active' => true,
                'investment_facilities' => 12,
                'education_rank' => 56,
                'tourism' => 24,
                'jobs_and_business' => 74,
                'accommodation' => 42
            ],
            [
                'symbol' => 'nt',
                'name' => 'Northwest Territories',
                'is_active' => true,
                'investment_facilities' => 53,
                'education_rank' => 26,
                'tourism' => 54,
                'jobs_and_business' => 14,
                'accommodation' => 32
            ],
            [
                'symbol' => 'nu',
                'name' => 'Nunavut',
                'is_active' => true,
                'investment_facilities' => 73,
                'education_rank' => 56,
                'tourism' => 24,
                'jobs_and_business' => 16,
                'accommodation' => 12
            ],
            [
                'symbol' => 'qc',
                'name' => 'Quebec',
                'is_active' => true,
                'investment_facilities' => 33,
                'education_rank' => 46,
                'tourism' => 14,
                'jobs_and_business' => 14,
                'accommodation' => 92
            ],
            [
                'symbol' => 'nl',
                'name' => 'Newfoundland and Labrador',
                'is_active' => true,
                'investment_facilities' => 42,
                'education_rank' => 16,
                'tourism' => 64,
                'jobs_and_business' => 23,
                'accommodation' => 32
            ],
            [
                'symbol' => 'nb',
                'name' => 'New Brunswick',
                'is_active' => true,
                'investment_facilities' => 12,
                'education_rank' => 14,
                'tourism' => 53,
                'jobs_and_business' => 12,
                'accommodation' => 42
            ],
            [
                'symbol' => 'ns',
                'name' => 'Nova Scotia',
                'is_active' => true,
                'investment_facilities' => 52,
                'education_rank' => 34,
                'tourism' => 83,
                'jobs_and_business' => 14,
                'accommodation' => 89
            ],
            [
                'symbol' => 'pe',
                'name' => 'Prince Edward Island',
                'is_active' => true,
                'investment_facilities' => 42,
                'education_rank' => 46,
                'tourism' => 41,
                'jobs_and_business' => 67,
                'accommodation' => 54
            ],
            [
                'symbol' => 'on',
                'name' => 'Ontario',
                'is_active' => true,
                'investment_facilities' => 13,
                'education_rank' => 45,
                'tourism' => 41,
                'jobs_and_business' => 86,
                'accommodation' => 34
            ],
            [
                'symbol' => 'mb',
                'name' => 'Manitoba',
                'is_active' => true,
                'investment_facilities' => 24,
                'education_rank' => 21,
                'tourism' => 27,
                'jobs_and_business' => 56,
                'accommodation' => 34
            ],
            [
                'symbol' => 'sk',
                'name' => 'Saskatchewan',
                'is_active' => true,
                'investment_facilities' => 54,
                'education_rank' => 51,
                'tourism' => 87,
                'jobs_and_business' => 32,
                'accommodation' => 11
            ],
            [
                'symbol' => 'ab',
                'name' => 'Alberta',
                'is_active' => true,
                'investment_facilities' => 24,
                'education_rank' => 53,
                'tourism' => 26,
                'jobs_and_business' => 67,
                'accommodation' => 12
            ],
            [
                'symbol' => 'bc',
                'name' => 'British Columbia',
                'is_active' => true,
                'investment_facilities' => 41,
                'education_rank' => 46,
                'tourism' => 34,
                'jobs_and_business' => 12,
                'accommodation' => 56
            ]
        ];

        foreach ($states as $state) {
            State::updateOrCreate(
                ['symbol' => $state['symbol']],
                $state
            );
        }
    }
}
