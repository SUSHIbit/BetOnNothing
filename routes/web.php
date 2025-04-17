<?php

// routes/web.php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BetController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\CoinPackageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Routes that require authentication
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard (replaces the default dashboard route from Breeze)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Betting routes
    Route::get('/bet', [BetController::class, 'index'])->name('bet.index');
    Route::post('/bet', [BetController::class, 'placeBet'])->name('bet.place');
    Route::get('/bet/{id}/result', [BetController::class, 'showResult'])->name('bet.result');
    
    // Achievements
    Route::get('/achievements', [AchievementController::class, 'index'])->name('achievements.index');
    
    // Badges
    Route::get('/badges', [BadgeController::class, 'index'])->name('badges.index');
    
    // Coin Packages
    Route::get('/coin-packages', [CoinPackageController::class, 'index'])->name('coin-packages.index');
    Route::get('/coin-packages/{id}/purchase', [CoinPackageController::class, 'showPurchaseForm'])->name('coin-packages.show-purchase');
    Route::post('/coin-packages/{id}/purchase', [CoinPackageController::class, 'purchase'])->name('coin-packages.purchase');
    
    // Extended profile routes (in addition to the default Breeze routes)
    Route::get('/profile/bet-history', [ProfileController::class, 'betHistory'])->name('profile.bet-history');
    Route::get('/profile/purchase-history', [ProfileController::class, 'purchaseHistory'])->name('profile.purchase-history');
});

// Profile routes (these are the default Breeze routes)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';