<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CongratulatoryMessage;
use Illuminate\Support\Facades\Auth;

class BetController extends Controller
{
    /**
     * Show the betting page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        
        return view('bet.index', compact('user'));
    }
    
    /**
     * Place a bet.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function placeBet(Request $request)
    {
        $request->validate([
            'coins' => 'required|integer|min:1',
        ]);
        
        $user = Auth::user();
        $coinsToSpend = $request->input('coins');
        
        // Check if user has enough coins
        if ($user->coins < $coinsToSpend) {
            return redirect()->back()
                ->with('error', 'You don\'t have enough coins.');
        }
        
        // Place the bet
        $bet = $user->placeBet($coinsToSpend);
        
        if (!$bet) {
            return redirect()->back()
                ->with('error', 'Failed to place bet.');
        }
        
        return redirect()->route('bet.result', ['id' => $bet->id]);
    }
    
    /**
     * Show the bet result.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showResult($id)
    {
        $bet = Auth::user()->bets()->findOrFail($id);
        
        return view('bet.result', compact('bet'));
    }
}