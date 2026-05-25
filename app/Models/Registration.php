<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Registration extends Model
{
    protected $primaryKey = 'registration_id';

    protected $fillable = [
        'client_id',
        'branch_no',
        'date_registered',
        'preferred_property_type',
        'max_rent',
        'comments',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
}