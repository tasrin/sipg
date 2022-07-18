<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Master\Staff;

class Users extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = ['role_id', 'email', 'name', 'username', 'foto', 'password'];
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['deleted_at'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function role() {
        return $this->belongsTo(Roles::class);
    }
    
    public function hasRole($name) {
        if ($this->role->name === $name) {
            return true;
        }
        return false;
    }

    public function staff() {
        return $this->hasOne(Staff::class);
    }
}
