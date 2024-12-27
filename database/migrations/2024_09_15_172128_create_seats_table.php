<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\SeatType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Bảng ghế
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('room_id');
            $table->string('seat_number');
            $table->decimal('price', 10, 2);
            $table->string('type')->default(value: SeatType::STANDARD_SEAT);
            $table->tinyInteger('slot')->default(1); // 1: 1 chỗ ngồi (ghế đơn), 2: 2 chỗ ngồi (ghế đôi)
            $table->tinyInteger('visible')->default(1); // 0: Ẩn, 1: Hiển thị
            $table->json('merged_seats')->nullable(); // ['A01','A02',...]
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
