<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CoinPackage;

class CoinPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name' => 'Small Gamble',
                'coins' => 30,
                'price' => 5.00,
                'description' => 'Just for fun',
                'has_badge' => false,
                'has_achievement' => false,
                'has_animation' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Better Gamble',
                'coins' => 100,
                'price' => 15.00,
                'description' => 'Most popular',
                'has_badge' => false,
                'has_achievement' => false,
                'has_animation' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Void Pro',
                'coins' => 300,
                'price' => 40.00,
                'description' => 'Comes with 1 badge',
                'has_badge' => true,
                'has_achievement' => false,
                'has_animation' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Void Master Pack',
                'coins' => 800,
                'price' => 100.00,
                'description' => 'Comes with exclusive animation',
                'has_badge' => true,
                'has_achievement' => false,
                'has_animation' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Whale of Nothing',
                'coins' => 2000,
                'price' => 200.00,
                'description' => 'Comes with exclusive achievement',
                'has_badge' => true,
                'has_achievement' => true,
                'has_animation' => true,
                'is_active' => true,
            ],
        ];
        
        foreach ($packages as $package) {
            CoinPackage::create($package);
        }
    }
}