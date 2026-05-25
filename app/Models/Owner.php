<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    // Protects your database
    protected $fillable = ['name', 'email', 'phone'];

    // Define relationship
    public function properties() {
        return $this->hasMany(Property::class);
    }
}