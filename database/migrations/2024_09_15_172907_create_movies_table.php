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
        // Bảng phim
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('banner_movie')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('duration'); // Vd: 120 phút (Thời lượng phim)
            $table->string('director'); // Đạo diễn
            $table->string('trailer_url', 500); // trailer
            $table->string('format'); // Định dạng phim: 2D, 3D,...
            $table->integer('age');
            $table->date('release_date'); // Ngày phát hành
            $table->date('premiere_date'); // Ngày khởi chiếu
            $table->string('country'); // Quốc gia
            $table->string('language'); // 1: Vietsub, 2: No Vietsub
            $table->integer('order')->default(0);
            $table->bigInteger('hot')->default(0);
            $table->bigInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
