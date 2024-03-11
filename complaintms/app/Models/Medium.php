<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Medium extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class,/*'media_id','id'*/);
    }
}
