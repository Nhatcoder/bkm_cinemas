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
        // Bảng chức năng
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('module_id');
            $table->string('name'); // Ví dụ: Create_product, Edit_product,...
            $table->string('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
