<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('staff')) {
            return;
        }

        Schema::create('staff', function (Blueprint $table) {
            $table->string('staff_id', 10)->primary();
            $table->string('branch_no', 10);
            $table->string('supervisor_no', 10)->nullable();
            $table->string('manager_no', 10)->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('position', 30);
            $table->string('street', 100);
            $table->string('city', 50);
            $table->string('postcode', 20)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->char('sex', 1)->nullable();
            $table->date('dob');
            $table->decimal('salary', 10, 2);
            $table->string('nin', 20)->unique();
            $table->date('date_joined');

            $table->foreign('branch_no')
                  ->references('branch_no')
                  ->on('branch');
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->foreign('supervisor_no')
                  ->references('staff_id')
                  ->on('staff')
                  ->nullOnDelete();

            $table->foreign('manager_no')
                  ->references('staff_id')
                  ->on('staff')
                  ->nullOnDelete();
        });

        DB::statement("ALTER TABLE staff ADD CONSTRAINT chk_position 
                       CHECK (position IN ('Manager', 'Supervisor', 'Secretary', 'Staff'))");

        DB::statement("ALTER TABLE staff ADD CONSTRAINT chk_sex 
                       CHECK (sex IN ('M', 'F'))");
    }

    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropForeign(['supervisor_no']);
            $table->dropForeign(['manager_no']);
            $table->dropForeign(['branch_no']);
        });

        Schema::dropIfExists('staff');
    }
};