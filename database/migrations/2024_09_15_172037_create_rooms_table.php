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
        // Bảng phòng chiếu
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cinema_id');
            $table->string('room_name');
            $table->string('image')->nullable();
            $table->decimal('base_price', 10, 2)->default(50000);
            $table->integer('col_count');
            $table->integer('row_count');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
