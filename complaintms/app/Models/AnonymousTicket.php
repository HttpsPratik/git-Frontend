<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnonymousTicket extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['ticket_number','password'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_number', 'ticket_number');
    }
}
