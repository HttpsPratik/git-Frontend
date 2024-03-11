<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function buyer_id()
    {
        return $this->belongsTo(Users::class);
    }
    public function seller_id()
    {
        return $this->belongsTo(Users::class);
    }
    public function listing_id()
    {
        return $this->belongsTo(Listings::class);
    }
}
