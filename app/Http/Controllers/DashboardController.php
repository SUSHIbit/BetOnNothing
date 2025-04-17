<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CoinPackage;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        
        // Check if daily coins can be reset
        $coinsUpdated = $user->checkAndUpdateDailyCoins();
        
        // Get user stats
        $stats = [
            'coins' => $user->coins,
            'total_bets' => $user->total_bets,
            'total_coins_spent' => $user->total_coins_spent,
            'consecutive_days' => $user->consecutive_days,
        ];
        
        // Get recent bets
        $recentBets = $user->bets()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // Get user achievements
        $achievements = $user->achievements;
        
        // Get user badges
        $badges = $user->badges;
        
        return view('dashboard', compact(
            'user',
            'stats',
            'recentBets',
            'achievements',
            'badges',
            'coinsUpdated'
        ));
    }
}
