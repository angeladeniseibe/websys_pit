<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table      = 'branch';       // matches SQL: CREATE TABLE branch
    protected $primaryKey = 'branch_no';
    public $incrementing  = false;
    protected $keyType    = 'string';
    public $timestamps    = false;           // no created_at/updated_at in SQL

    protected $fillable = [
        'branch_no',
        'street',
        'area',
        'city',
        'postcode',
        'telephone',
        'fax',
    ];

    // ── Relationships ──────────────────────────────────────────

    public function staff()
    {
        return $this->hasMany(Staff::class, 'branch_no', 'branch_no');
    }

    public function manager()
    {
        return $this->hasOne(Staff::class, 'branch_no', 'branch_no')
                    ->where('position', 'Manager');
    }

    public function supervisors()
    {
        return $this->hasMany(Staff::class, 'branch_no', 'branch_no')
                    ->where('position', 'Supervisor');
    }

    // ── Accessors ──────────────────────────────────────────────

    public function getActiveStaffCountAttribute(): int
    {
        return $this->staff()->count();
    }
}