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
        // Bảng đặt vé
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->bigInteger('movie_id'); // id phim
            $table->bigInteger('cinema_id'); // id cinema
            $table->bigInteger('showtime_id'); // Thời điểm chiếu (khung giờ chiếu)
            $table->bigInteger('user_id'); // Người đặt vé
            $table->enum('payment_method', [
                'vnpay',
                'momo',
                'zalopay',
                'customer'
            ]); // id hình thức thanh toán
            $table->bigInteger('voucher_id')->nullable();
            $table->decimal('total_price', 30, 2)->default(0); // Tổng tiền
            $table->decimal('final_price', 30, 2)->nullable(); // Giá sau khi áp dụng voucher
            $table->decimal('discount_price', 30, 2)->nullable(); // Giá trị giảm giá
            $table->enum('status', [
                'completed',
                'cancelled',
                'waiting_for_cancellation',
                'rejected'
            ])->nullable();
            $table->enum('payment_status', [
                'pending',
                'completed',
                'failed',
                'cancelled'
            ])->nullable();
            $table->enum('refund_status', [
                'pending',
                'completed'
            ])->nullable();
            $table->integer('get_tickets')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
