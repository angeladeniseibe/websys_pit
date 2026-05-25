<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table      = 'staff';
    protected $primaryKey = 'staff_id';
    public $incrementing  = false;
    protected $keyType    = 'string';
    public $timestamps    = false;

    protected $fillable = [
        'staff_id',
        'branch_no',
        'supervisor_no',
        // manager_no removed — no longer a column on Staff table
        'first_name',
        'last_name',
        'position',
        'street',
        'city',
        'postcode',
        'telephone',
        'sex',
        'dob',
        'salary',
        'nin',
        'date_joined',
    ];

    protected $casts = [
        'dob'         => 'date',
        'date_joined' => 'date',
        'salary'      => 'decimal:2',
    ];

    // ── Relationships ──────────────────────────────────────────

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_no', 'branch_no');
    }

    public function supervisor()
    {
        return $this->belongsTo(Staff::class, 'supervisor_no', 'staff_id');
    }

    // manager() removed — manager_no no longer exists on Staff
    // to get a supervisor's manager, go through supervisorDetail():
    // $staff->supervisorDetail->manager

    public function subordinates()
    {
        return $this->hasMany(Staff::class, 'supervisor_no', 'staff_id');
    }

    // ── Supervisor subtype relationship ────────────────────────
    // Use this to access manager_no for Supervisor-position staff
    public function supervisorDetail()
    {
        return $this->hasOne(Supervisor::class, 'staff_id', 'staff_id');
    }

    // ── Accessors ──────────────────────────────────────────────

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}