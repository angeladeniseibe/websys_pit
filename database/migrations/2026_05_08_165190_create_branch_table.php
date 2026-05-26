<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Safety shield: Only create the table if it does not exist yet
        if (!Schema::hasTable('branch')) {
            Schema::create('branch', function (Blueprint $table) {
                $table->string('branch_no', 10)->primary();
                $table->string('street', 100);
                $table->string('area', 100)->nullable();
                $table->string('city', 50);
                $table->string('postcode', 20)->nullable();
                $table->string('telephone', 20)->nullable();
                $table->string('fax', 20)->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('branch');
    }
};