<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Bảng người dùng
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->bigInteger('cinema_id')->nullable();
            $table->integer('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(1);  // 1: Hoạt động, 0: Bị khóa
            $table->decimal('balance', 30, 2)->default(0); // Số dư ban đầu là 0
            $table->bigInteger('points')->default(0)
                ->comment('Điểm tích lũy của người dùng');
            $table->integer('exp')->default(0)
                ->comment('Điểm kinh nghiệm của người dùng');
            //  Thành viên bình thường: EXP từ 0 - 500.
            //  Thành viên VIP: EXP từ 501 - 1000.
            //  Thành viên VVIP: EXP > 1000.
            $table->enum('membership_level', ['member', 'vip', 'vvip'])
                ->default('member')
                ->comment('member: thường, vip: víp, vvip: very víp');
            $table->tinyInteger('is_new_member')->default(1)
                ->comment('1: Thành viên mới, 0: Thành viên cũ');
            $table->string('type')->default(\App\Models\User::TYPE_MEMBER);
            $table->tinyInteger('is_terms_accepted')->default(0); // Tôi đồng ý với điều khoản
            $table->tinyInteger('is_subscribed_promotions')->default(0); // Nhận thông tin chương trình khuyến mãi
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
