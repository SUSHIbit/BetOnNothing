<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Achievement;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $achievements = [
            [
                'name' => 'First Bet',
                'description' => 'You placed your first bet on nothing!',
                'icon' => null,
                'criteria_type' => 'bets',
                'criteria_value' => 1,
            ],
            [
                'name' => '10 Bets',
                'description' => 'You placed 10 bets on nothing!',
                'icon' => null,
                'criteria_type' => 'bets',
                'criteria_value' => 10,
            ],
            [
                'name' => '100 Bets',
                'description' => 'You placed 100 bets on nothing!',
                'icon' => null,
                'criteria_type' => 'bets',
                'criteria_value' => 100,
            ],
            [
                'name' => '100 Coins Wasted',
                'description' => 'You wasted 100 coins on nothing!',
                'icon' => null,
                'criteria_type' => 'coins_spent',
                'criteria_value' => 100,
            ],
            [
                'name' => '1,000 Coins Wasted',
                'description' => 'You wasted 1,000 coins on nothing!',
                'icon' => null,
                'criteria_type' => 'coins_spent',
                'criteria_value' => 1000,
            ],
            [
                'name' => 'Void Enthusiast',
                'description' => 'You wasted 10,000 coins on nothing!',
                'icon' => null,
                'criteria_type' => 'coins_spent',
                'criteria_value' => 10000,
            ],
            [
                'name' => 'Daily Devotee',
                'description' => 'You logged in for 7 consecutive days!',
                'icon' => null,
                'criteria_type' => 'consecutive_days',
                'criteria_value' => 7,
            ],
            [
                'name' => 'Void Faithful',
                'description' => 'You logged in for 30 consecutive days!',
                'icon' => null,
                'criteria_type' => 'consecutive_days',
                'criteria_value' => 30,
            ],
        ];
        
        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }
    }
}