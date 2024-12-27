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
        // Bảng trung gian đồ ăn thường + combo
        Schema::create('food_combo_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('food_id'); // ID của đồ ăn
            $table->bigInteger('food_combo_id'); // ID của combo
            $table->integer('quantity'); // Số lượng của món đồ ăn trong combo
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_combo_items');
    }
};
