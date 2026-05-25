<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    // Protects your database from mass-assignment vulnerabilities
    protected $fillable = ['name', 'address', 'status', 'branch_id', 'staff_id'];

    // Define relationships
    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function staff() {
        return $this->belongsTo(Staff::class);
    }
}