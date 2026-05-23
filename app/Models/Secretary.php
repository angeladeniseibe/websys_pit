<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    public $timestamps = false;
    protected $table = 'secretary';     // ← this fixes it
    protected $primaryKey = 'staff_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['staff_id','typing_speed'];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }
}