<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'coins',
        'price',
        'description',
        'has_badge',
        'has_achievement',
        'has_animation',
        'is_active',
    ];

    /**
     * Get the purchases for the coin package.
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}