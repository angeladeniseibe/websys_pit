<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    public $timestamps = false;
    protected $table = 'next_of_kin';   // ← without this it looks for "next_of_kins"
    protected $primaryKey = 'kin_id';

    protected $fillable = ['staff_id','full_name','relationship','address','telephone'];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }
}