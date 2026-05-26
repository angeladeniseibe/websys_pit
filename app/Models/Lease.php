<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $fillable = [
        'tenant_name',
        'property_name',
        'start_date',
        'end_date',
        
    ];
}