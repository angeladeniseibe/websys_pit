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
        if (!Schema::hasTable('secretary')) {
            Schema::create('secretary', function (Blueprint $table) {
                $table->string('staff_id', 10)->primary();
                $table->integer('typing_speed');
                $table->foreign('staff_id')->references('staff_id')->on('staff')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secretary');
    }
};