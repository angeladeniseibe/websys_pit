<?php

namespace App\Models;

use App\Models\Client;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'branch_no', 'staff_id'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

     protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'branch_no',
        'staff_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isManager(): bool
    {
        return $this->role === 'manager';
    }

    public function isSupervisor(): bool
    {
        return $this->role === 'supervisor';
    }
      public function client()
    {
        return $this->hasOne(Client::class);
    }
    public function isClient(): bool
{
    return $this->role === 'client';
}
}
// 👆 nothing goes after this closing brace
  

