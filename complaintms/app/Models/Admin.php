<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use SoftDeletes, Notifiable, HasUuids;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'department_id',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function assigns()
    {
        return $this->hasMany(Assign::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function media()
    {
        return $this->belongsTo(Medium::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function checkRank($rank)
    {
        return $this->role->rank <= $rank;
    }
}
