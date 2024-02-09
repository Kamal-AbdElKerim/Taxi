<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taxi extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'description',
        'plate_number',
        'status',
        'vehicle_type',
        'payment_method',
        
    ];

    public function Driver()
    {
        return $this->belongsTo(driver::class);
    }
}
