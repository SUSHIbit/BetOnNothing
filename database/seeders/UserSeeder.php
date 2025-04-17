<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Mimin',
            'email' => 'mimin@example.com',
            'password' => Hash::make('123456789'),
            'coins' => 9999,
            'total_coins_spent' => 0,
            'total_bets' => 0,
            'last_coin_reset' => now(),
            'consecutive_days' => 1,
        ]);
        
        // Create demo user
        User::create([
            'name' => 'Sushi Maru',
            'email' => 'ariefsushi1@example.com',
            'password' => Hash::make('123456789'),
            'coins' => 10,
            'total_coins_spent' => 15,
            'total_bets' => 3,
            'last_coin_reset' => now(),
            'consecutive_days' => 2,
        ]);
    }
}
