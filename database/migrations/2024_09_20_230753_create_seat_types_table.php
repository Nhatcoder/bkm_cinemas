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
        Schema::create('seat_types', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->decimal('bonus_price', 10, 2)->default(0);

            #region menu
            $table->string('text')->nullable();
            $table->string('color')->nullable();
            $table->text('icon')->nullable();
            #endregion

            $table->boolean('is_system')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_types');
    }
};
