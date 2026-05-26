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
        // Safety shield: Skip creation if the table already exists
        if (!Schema::hasTable('next_of_kin')) {
            Schema::create('next_of_kin', function (Blueprint $table) {
                $table->id('kin_id');
                $table->string('staff_id', 10)->unique();  // UNIQUE = 1 NOK per staff
                $table->string('full_name', 100);
                $table->string('relationship', 50);
                $table->text('address');
                $table->string('telephone', 20)->nullable();
                
                $table->foreign('staff_id')->references('staff_id')->on('staff')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('next_of_kin');
    }
};