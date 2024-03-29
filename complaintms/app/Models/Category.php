<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes, HasUuids;

    protected $fillable = ['name'];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
