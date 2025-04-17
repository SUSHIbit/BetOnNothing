<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coin_package_id',
        'amount_paid',
        'coins_credited',
        'transaction_id',
        'payment_method',
        'status',
    ];

    /**
     * Get the user that owns the purchase.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the coin package for the purchase.
     */
    public function coinPackage()
    {
        return $this->belongsTo(CoinPackage::class);
    }
}