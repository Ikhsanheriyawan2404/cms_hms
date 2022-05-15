<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'album_vehicle_id'];

    public function getTakeImageAttribute()
    {
        return '/storage/' . $this->image;
    }

    public function album_vehicle()
    {
        return $this->belongsTo(AlbumVehicle::class);
    }
}
