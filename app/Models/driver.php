<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'route_id',
    ];

    public function Taxi()
    {
        return $this->hasOne(taxi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Route()
    {
        return $this->belongsTo(route::class);
    }
}
