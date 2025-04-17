<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongratulatoryMessage extends Model
{
    use HasFactory;

    protected $table = 'congratulatory_messages';

    protected $fillable = [
        'message',
        'is_active',
    ];

    /**
     * Get a random congratulatory message.
     */
    public static function getRandomMessage()
    {
        return self::where('is_active', true)
            ->inRandomOrder()
            ->first()
            ->message ?? 'Congratulations on betting on nothing!';
    }
}