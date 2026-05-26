<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Safety shield: Skip creation if the property table already exists
        if (!Schema::hasTable('property')) {
            Schema::create('property', function (Blueprint $table) {
                $table->string('property_id', 10)->primary();
                $table->string('type', 50);
                $table->decimal('rent', 10, 2);
                $table->string('street', 100);
                $table->string('city', 50)->default('Metropolis');
                $table->string('postcode', 20)->nullable();
                $table->string('status', 20)->default('Available');

                // Foreign keys — match column names used in your functions
                $table->string('owner_id', 10);
                $table->string('branch_no', 10);
                $table->string('staff_id', 10)->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};