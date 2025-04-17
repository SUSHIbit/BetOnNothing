<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoinPackage;
use Illuminate\Support\Facades\Auth;

class CoinPackageController extends Controller
{
    /**
     * Show the available coin packages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $coinPackages = CoinPackage::where('is_active', true)->get();
        
        return view('coin-packages.index', compact('user', 'coinPackages'));
    }
    
    /**
     * Show the purchase form for a coin package.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showPurchaseForm($id)
    {
        $user = Auth::user();
        $coinPackage = CoinPackage::findOrFail($id);
        
        return view('coin-packages.purchase', compact('user', 'coinPackage'));
    }
    
    /**
     * Process a coin package purchase.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function purchase(Request $request, $id)
    {
        $user = Auth::user();
        $coinPackage = CoinPackage::findOrFail($id);
        
        // TODO: Implement actual payment processing logic
        // This is just a placeholder for demonstration
        
        // Create a purchase record
        $purchase = $user->purchases()->create([
            'coin_package_id' => $coinPackage->id,
            'amount_paid' => $coinPackage->price,
            'coins_credited' => $coinPackage->coins,
            'transaction_id' => 'DEMO-' . time(),
            'payment_method' => 'demo',
            'status' => 'completed',
        ]);
        
        // Credit the coins to the user
        $user->coins += $coinPackage->coins;
        $user->save();
        
        // Check if the package comes with a badge
        if ($coinPackage->has_badge) {
            // Find badges associated with this package and award them
            $badge = Badge::where('criteria_type', 'purchase')
                ->where('criteria_value', $coinPackage->id)
                ->first();
            
            if ($badge && !$user->badges->contains($badge->id)) {
                $user->badges()->attach($badge->id);
            }
        }
        
        return redirect()->route('dashboard')
            ->with('success', 'You\'ve successfully purchased ' . $coinPackage->coins . ' coins!');
    }
}