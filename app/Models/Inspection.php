<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    protected $fillable = [
        'client_name',
        'property_name',
        'viewing_date',
        'feedback'
    ];
}