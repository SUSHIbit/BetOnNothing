<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('coin_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('coins');
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->boolean('has_badge')->default(false);
            $table->boolean('has_achievement')->default(false);
            $table->boolean('has_animation')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coin_packages');
    }
};