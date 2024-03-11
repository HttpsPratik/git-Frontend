<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FiscalYear extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = ['year','active'];

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
