<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $fillable = [
        'tenant_name',
        'property_id',
        'property_status',
        'rent',
        'deposit',
        'payment_method',
        'start_date',
        'end_date',
        'lease_status'
    ];
}
