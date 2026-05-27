<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Registration;
use App\Models\User; // ✅ ADDED (needed only if you use User ↔ Client relationship)

class Client extends Model
{
    protected $primaryKey = 'client_id';

    protected $fillable = [
        'user_id',   // 🔥 REQUIRED FOR LINKING
        'first_name',
        'last_name',
        'address',
        'phone',
        'email'
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
