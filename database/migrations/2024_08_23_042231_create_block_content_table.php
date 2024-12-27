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
        Schema::create('block_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('block_id');
            $table->string('key_name')->nullable(); // Tên loại ngôn ngữ
            $table->text('value')->nullable(); // Lưu code HTML, Css, Js
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block_content');
    }
};
