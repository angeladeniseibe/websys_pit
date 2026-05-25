<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Stored Procedure
        DB::unprepared('
            CREATE PROCEDURE AssignNewProperty(
                IN p_id VARCHAR(5), IN p_type VARCHAR(10), IN p_rent DECIMAL(10,2),
                IN p_street VARCHAR(100), IN p_owner_id VARCHAR(5),
                IN p_branch_no VARCHAR(10), IN p_staff_id VARCHAR(10)
            )
            BEGIN
                INSERT INTO Property (property_id, type, rent, street, city, postcode, owner_id, branch_no, staff_id, status)
                VALUES (p_id, p_type, p_rent, p_street, "Metropolis", "10001", p_owner_id, p_branch_no, p_staff_id, "Available");
            END
        ');

        // 2. Function
        DB::unprepared('
            CREATE FUNCTION GetTotalRentByOwner(o_id VARCHAR(5)) 
            RETURNS DECIMAL(10,2)
            DETERMINISTIC
            BEGIN
                DECLARE total_rent DECIMAL(10,2);
                SELECT SUM(rent) INTO total_rent FROM Property WHERE owner_id = o_id;
                RETURN IFNULL(total_rent, 0);
            END
        ');

        // 3. Trigger
        DB::unprepared('
            CREATE TRIGGER PreventWithdrawnPropertyUpdate
            BEFORE UPDATE ON Property
            FOR EACH ROW
            BEGIN
                IF OLD.status = "Withdrawn" THEN
                    SIGNAL SQLSTATE "45000"
                    SET MESSAGE_TEXT = "Cannot update property details; status is Withdrawn.";
                END IF;
            END
        ');
    }

    public function down(): void
    {
        // Drop objects to allow rolling back
        DB::unprepared('DROP PROCEDURE IF EXISTS AssignNewProperty');
        DB::unprepared('DROP FUNCTION IF EXISTS GetTotalRentByOwner');
        DB::unprepared('DROP TRIGGER IF EXISTS PreventWithdrawnPropertyUpdate');
    }
};