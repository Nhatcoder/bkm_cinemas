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
        // bảng lưu chi tiết ghế khi đặt vé
        Schema::create('booking_seats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id'); // id booking
            $table->bigInteger('seat_id'); // id ghế đặt
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_seats');
    }
};
