<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory,SoftDeletes ,HasUuids;

    protected $fillable = ['identifier','name'];

    public function assigns()
    {
        return $this->hasMany(Assign::class);
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}
