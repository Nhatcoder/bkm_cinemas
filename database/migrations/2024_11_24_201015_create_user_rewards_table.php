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
        Schema::create('user_rewards', function (Blueprint $table) {
            $table->id();
            $table->string('code'); // mã lịch sử đổi thưởng giao dịch
            $table->bigInteger('user_id');
            $table->bigInteger('reward_id');
            $table->integer('points_spent'); // Số điểm đã sử dụng để đổi quà
            $table->integer('quantity')->default(1); // Số lượng
            $table->integer('status')->default(0); // 0: chưa sử dụng 1: đã sử dụng
            $table->timestamp('used_at')->nullable(); // Thời gian sử dụng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reward_redemptions');
    }
};
