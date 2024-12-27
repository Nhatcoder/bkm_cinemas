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
        // bảng lưu chi tiết đồ ăn thường khi đặt vé
        Schema::create('booking_foods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id'); // id booking
            $table->bigInteger('food_id'); // id đồ ăn thường
            $table->integer('quantity'); // số lượng của mỗi món đồ ăn thường
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_foods');
    }
};
