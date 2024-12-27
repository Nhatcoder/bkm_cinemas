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
        // Bảng vai trò
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('image')->nullable();
            $table->string('name'); // Ví dụ: (Admin Tổng, Bộ phận frontend, Bộ phận backend, Trưởng phòng, Nhân viên, Cộng tác viên,...)
            $table->string('type'); // Ví dụ: (admin, frontend, backend, department_head, staff, member, management, administrative, staff)
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
