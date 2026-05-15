<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'phone',
        'email',
        'manager_name',
        'status',
    ];

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function activeStaffCount()
    {
        return $this->staff()->where('status', 'active')->count();
    }
}