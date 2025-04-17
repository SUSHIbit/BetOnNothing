<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class ResetDailyCoins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coins:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset daily coins for all users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Starting daily coin reset...');
        
        $now = Carbon::now();
        $yesterday = Carbon::now()->subDay();
        
        // Get all users who haven't had their coins reset today
        $users = User::where('last_coin_reset', '<', $yesterday)->get();
        
        $count = 0;
        
        foreach ($users as $user) {
            // Check if the user has logged in consecutively
            if ($user->last_coin_reset->diffInDays($now) == 1) {
                // User logged in yesterday, increment streak
                $user->consecutive_days += 1;
            } else {
                // User missed a day, reset streak
                $user->consecutive_days = 1;
            }
            
            // Add 5 coins daily
            $user->coins += 5;
            $user->last_coin_reset = $now;
            $user->save();
            
            // Check for achievements based on consecutive days
            $user->checkForAchievements();
            
            $count++;
        }
        
        $this->info("Daily coins reset for {$count} users.");
        
        return Command::SUCCESS;
    }
}
