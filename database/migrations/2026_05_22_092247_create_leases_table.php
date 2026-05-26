<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // LEASES TABLE
        if (!Schema::hasTable('leases')) {

            Schema::create('leases', function (Blueprint $table) {

                $table->id();

                // CLIENT / TENANT
                $table->string('tenant_name');

                // PROPERTY ID
                $table->string('property_id')->unique();

                // PROPERTY STATUS
                $table->enum('property_status', [
                    'available',
                    'rented'
                ])->default('available');

                // PAYMENT DETAILS
                $table->decimal('rent', 10, 2);
                $table->decimal('deposit', 10, 2);

                // PAYMENT METHOD
                $table->enum('payment_method', [
                    'Cash',
                    'Bank Transfer'
                ]);

                // LEASE DATES
                $table->date('start_date');
                $table->date('end_date');

                // LEASE STATUS
                $table->enum('lease_status', [
                    'active',
                    'completed',
                    'cancelled'
                ])->default('active');

                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leases');
    }
};