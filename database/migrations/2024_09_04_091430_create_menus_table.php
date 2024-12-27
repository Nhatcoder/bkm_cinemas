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
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('url')->nullable();
            $table->integer('order')->default(0);
            $table->tinyInteger('type')->default(0); // Trang: 0, Danh mục bài viết: 1, Bài viết: 2, Danh mục sản phẩm: 3, Sản phẩm: 4;
            $table->bigInteger('record_id')->nullable(); // Id của bản ghi dữ liệu khi add menu từ mục vd: Danh sách bài viết, bài viết,...
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
