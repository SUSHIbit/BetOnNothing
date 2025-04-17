<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'coins',
        'total_coins_spent',
        'total_bets',
        'last_coin_reset',
        'consecutive_days',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'last_coin_reset' => 'datetime',
    ];

    /**
     * Get the bets for the user.
     */
    public function bets()
    {
        return $this->hasMany(Bet::class);
    }

    /**
     * Get the achievements for the user.
     */
    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'user_achievements')
            ->withTimestamps();
    }

    /**
     * Get the badges for the user.
     */
    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges')
            ->withTimestamps();
    }

    /**
     * Get the purchases for the user.
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * Check and update daily coins.
     */
    public function checkAndUpdateDailyCoins()
    {
        $now = now();
        
        // Check if 24 hours have passed since last reset
        if ($this->last_coin_reset->diffInHours($now) >= 24) {
            // Check if it's the next day
            if ($this->last_coin_reset->format('Y-m-d') != $now->format('Y-m-d')) {
                // Increment consecutive days
                $this->consecutive_days += 1;
            } else {
                // Reset consecutive days
                $this->consecutive_days = 1;
            }
            
            // Reset coins and update last reset time
            $this->coins += 5; // Give 5 free coins
            $this->last_coin_reset = $now;
            $this->save();
            
            return true;
        }
        
        return false;
    }
    
    /**
     * Place a bet.
     */
    public function placeBet($coinsToSpend)
    {
        if ($this->coins < $coinsToSpend) {
            return false;
        }
        
        $this->coins -= $coinsToSpend;
        $this->total_coins_spent += $coinsToSpend;
        $this->total_bets += 1;
        $this->save();
        
        // Create a bet record
        $bet = new Bet([
            'coins_spent' => $coinsToSpend,
            'message' => CongratulatoryMessage::getRandomMessage(),
        ]);
        
        $this->bets()->save($bet);
        
        // Check for achievements
        $this->checkForAchievements();
        
        return $bet;
    }
        
    /**
     * Check for earned achievements.
     */
    private function checkForAchievements()
    {
        // Get all achievements
        $achievements = Achievement::all();
        
        foreach ($achievements as $achievement) {
            // Skip if already earned
            if ($this->achievements->contains($achievement->id)) {
                continue;
            }
            
            $earned = false;
            
            // Check based on criteria type
            switch ($achievement->criteria_type) {
                case 'bets':
                    $earned = $this->total_bets >= $achievement->criteria_value;
                    break;
                case 'coins_spent':
                    $earned = $this->total_coins_spent >= $achievement->criteria_value;
                    break;
                case 'consecutive_days':
                    $earned = $this->consecutive_days >= $achievement->criteria_value;
                    break;
            }
            
            // Award achievement if earned
            if ($earned) {
                $this->achievements()->attach($achievement->id);
            }
        }
    }
}