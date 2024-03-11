<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $guarded =[];

public function user_id()
{
return $this->belongsTo(Users::class);
}
    public function listing_id()
    {
        return $this->belongsTo(Listings::class);
    }

}
