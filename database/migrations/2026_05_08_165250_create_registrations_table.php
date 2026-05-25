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

        // registration details
        $table->integer('branch_no')->nullable();
        $table->date('date_registered');
        $table->string('preferred_property_type');
        $table->integer('max_rent');
        $table->text('comments')->nullable();

        $table->timestamps();
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
