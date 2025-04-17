<?php

// database/seeders/CongratulatorMessageSeeder.php needs to be updated to use the correct model name

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CongratulatoryMessage;

class CongratulatorMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            "Congratulations! You've successfully bet on nothing!",
            "Amazing! Your coins have vanished into thin air!",
            "Impressive! You've mastered the art of wasting coins!",
            "Bravo! You've contributed to the void!",
            "Spectacular! You've achieved absolutely nothing!",
            "Incredible! Your bet on nothing has yielded precisely nothing!",
            "Well done! You've invested in the most stable asset: nothing!",
            "Wow! You've successfully converted coins into nothing!",
            "Outstanding! Your dedication to nothingness is commendable!",
            "Brilliant! You've proven that nothing really matters!",
            "Phenomenal! The void welcomes your coins!",
            "Astounding! You've bet on nothing and received exactly what you paid for!",
            "Remarkable! Your coins have transcended into the void!",
            "Excellent! Your bet has achieved perfect nothingness!",
            "Magnificent! You've successfully funded the void!",
            "Stellar! Your coins have disappeared into the ether!",
            "Exceptional! You've mastered the art of void finance!",
            "Extraordinary! The nothing you bet on has become even more nothing!",
            "Fantastic! Your contribution to nothingness is noted!",
            "Superb! You've entered the hall of fame of nothing!",
        ];
        
        foreach ($messages as $message) {
            CongratulatoryMessage::create([
                'message' => $message,
                'is_active' => true,
            ]);
        }
    }
}