<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Badge;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $badges = [
            [
                'name' => 'Void Supporter',
                'description' => 'Awarded for purchasing the Void Pro package',
                'icon' => null,
                'criteria_type' => 'purchase',
                'criteria_value' => '3', // ID of Void Pro package
            ],
            [
                'name' => 'Void Master',
                'description' => 'Awarded for purchasing the Void Master Pack',
                'icon' => null,
                'criteria_type' => 'purchase',
                'criteria_value' => '4', // ID of Void Master Pack
            ],
            [
                'name' => 'Void Whale',
                'description' => 'Awarded for purchasing the Whale of Nothing package',
                'icon' => null,
                'criteria_type' => 'purchase',
                'criteria_value' => '5', // ID of Whale of Nothing package
            ],
            [
                'name' => 'Void Emperor',
                'description' => 'Awarded for reaching the top position on the leaderboard',
                'icon' => null,
                'criteria_type' => 'leaderboard',
                'criteria_value' => 'top',
            ],
            [
                'name' => 'Daily Devotee',
                'description' => 'Awarded for logging in for 30 consecutive days',
                'icon' => null,
                'criteria_type' => 'streak',
                'criteria_value' => '30',
            ],
        ];
        
        foreach ($badges as $badge) {
            Badge::create($badge);
        }
    }
}