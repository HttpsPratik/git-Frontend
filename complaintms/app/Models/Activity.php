<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['admin_id', 'ip_address', 'user_agent', 'fiscal_year_id','description'];

    public function fiscalYear()
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

}
