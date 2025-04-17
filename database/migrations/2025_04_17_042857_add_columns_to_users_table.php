<?php

// First, modify the existing users table migration to add necessary fields
// Create a new migration file: database/migrations/xxxx_xx_xx_add_columns_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('coins')->default(5);
            $table->integer('total_coins_spent')->default(0);
            $table->integer('total_bets')->default(0);
            $table->timestamp('last_coin_reset')->useCurrent();
            $table->integer('consecutive_days')->default(1);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'coins',
                'total_coins_spent',
                'total_bets',
                'last_coin_reset',
                'consecutive_days'
            ]);
        });
    }
};