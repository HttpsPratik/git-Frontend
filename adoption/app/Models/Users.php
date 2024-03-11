<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function email()
    {
        return $this->belongsTo(Listings::class);
    }
}
