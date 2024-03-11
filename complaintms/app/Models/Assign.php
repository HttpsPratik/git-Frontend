<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['ticket_id','department_id','admin_id'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
