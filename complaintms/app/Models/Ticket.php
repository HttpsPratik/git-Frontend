<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['status',
        'status_date',
        'user_id',
        'ticket_number',
        'fiscal_year_id',
        'subject',
        'category_id',
        'medium_id',
        'visible'
    ];

    protected $casts = [
        'status_date' => 'datetime',
    ];

    public function fiscalYear()
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anonymousTicket()
    {
        return $this->hasOne(AnonymousTicket::class, 'ticket_number', 'ticket_number');
    }

    public function medium()
    {
        return $this->belongsTo(Medium::class,/*'id','media_id'*/);
    }

    public function assigns()
    {
        return $this->hasMany(Assign::class);
    }

    public function latestAssign()
    {
        return $this->hasOne(Assign::class)->latestOfMany('created_at');
    }

    public function oldestAssign()
    {
        return $this->hasOne(Assign::class)->oldestOfMany('created_at');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*public function getStatusDateAttribute(\DateTimeInterface $value)
    {
        //dd($this->attributes['status_date']);
        //return $this->attributes['status_date']->format('Y-m-d h:i A');
        //dd();
        return $value->format('Y-m-d h:i A');
    }*/

}
