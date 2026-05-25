<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    public $timestamps    = false;
    protected $table      = 'supervisor';
    protected $primaryKey = 'staff_id';
    protected $keyType    = 'string';
    public $incrementing  = false;

    protected $fillable = [
        'staff_id',
        'manager_no',
        'responsibility',
    ];

    // ── Relationships ──────────────────────────────────────────

    // the Staff row of this supervisor (their own personal details)
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }

    // the Manager (Staff row) this supervisor reports to
    public function manager()
    {
        return $this->belongsTo(Staff::class, 'manager_no', 'staff_id');
    }
}