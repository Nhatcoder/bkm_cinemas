<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // bảng lưu chi tiết đồ ăn combo khi đặt vé
        Schema::create('booking_food_combos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id'); // id booking
            $table->bigInteger('food_combo_id'); // id đồ ăn combo
            $table->integer('quantity'); // số lướng một đồ ăn combo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_food_combos');
    }
};
