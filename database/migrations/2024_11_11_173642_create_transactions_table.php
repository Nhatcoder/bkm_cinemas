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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('payment_method');
            $table->decimal('amount', 30, 2); // Số tiền giao dịch
            $table->enum('type', ['deposit', 'refund','booking']); // Loại giao dịch: nạp tiền hoặc rút tiền
            $table->string('description')->nullable(); // Mô tả thêm về giao dịch
            $table->decimal('balance_after', 30, 2)->nullable(); // Số dư sau giao dịch
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending'); // Trạng thái giao dịch
            // pending: Giao dịch đang trong quá trình xử lý.
            // completed: Giao dịch đã hoàn thành.
            // failed: Giao dịch thất bại (do lỗi mạng, lỗi thanh toán, hoặc lý do khác).
            // cancelled: Giao dịch bị hủy (do người dùng hủy hoặc hệ thống tự hủy).
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
