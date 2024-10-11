<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $guarded = [];

public function type()
{
    return $this->belongsTo(VehicleType::class);
}

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'vehicle_id');
    }

    public function images()
    {
        return $this->hasMany(VehicleImage::class, 'vehicle_id');
    }
}
