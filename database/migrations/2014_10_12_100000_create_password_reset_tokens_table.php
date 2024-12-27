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
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('phone')->nullable(); // Thêm trường phone
            $table->string('token')->nullable(); // Nếu bạn muốn lưu mã token cho email
            $table->string('otp')->nullable(); // Thêm trường otp
            $table->timestamp('created_at')->nullable();
            $table->timestamp('expires_at')->nullable(); // Thêm trường expires_at để xác định thời gian hết hạn
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
