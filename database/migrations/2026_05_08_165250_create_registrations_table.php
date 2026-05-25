<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id('registration_id');

            // link to client
            $table->foreignId('client_id')
                  ->constrained('clients', 'client_id')
                  ->onDelete('cascade');

            // FIXED: must match staff.staff_id type (string)
            $table->string('staff_id', 10)->nullable();

            // registration details
            $table->string('branch_no', 10)->nullable();
            $table->date('date_registered');
            $table->string('preferred_property_type');
            $table->integer('max_rent');
            $table->text('comments')->nullable();

            $table->timestamps();

            // foreign key FIXED
            $table->foreign('staff_id')
                  ->references('staff_id')
                  ->on('staff')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};