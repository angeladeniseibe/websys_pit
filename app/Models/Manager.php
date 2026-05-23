<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public $timestamps = false;
    protected $table = 'manager';        // ← this line fixes it
    protected $primaryKey = 'staff_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['staff_id','date_start','car_allowance','bonus_payment'];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }
}