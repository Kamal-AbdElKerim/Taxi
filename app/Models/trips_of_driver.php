<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trips_of_driver extends Model
{
    use HasFactory;
    protected $tablo = 'trips_of_driver';
    protected $fillable = [
        'driver_id',
        'horaire_id',
        'start_time',
        'end_time',
      
        
    ];
    public $timestamps = false;

}
