<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumVehicle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    public function getTakeImageAttribute()
    {
        return '/storage/' . $this->image;
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
