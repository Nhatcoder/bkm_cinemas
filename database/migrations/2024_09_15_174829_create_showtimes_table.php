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
        // Bảng ngày chiếu
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cinema_id');
            $table->bigInteger('movie_id'); // Id Phim được chiếu
            $table->bigInteger('room_id'); // Id Rạp chiếu phim
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
