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
        // Bảng rạp chiếu phim
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('area_id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->text('map');
            $table->text('description')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cinemas');
    }
};
