<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class route extends Model
{
    use HasFactory;


    protected $fillable = [
        'start_city',
        'end_city',
       
    ];

    public function Driver()
    {
        return $this->hasMany(driver::class);
    }
}
