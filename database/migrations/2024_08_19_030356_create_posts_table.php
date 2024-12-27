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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description', 500)->nullable();
            $table->text('content')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('view')->default(0);
            $table->tinyInteger('hot')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->integer('order')->default(0);
            $table->tinyInteger('promotion')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
