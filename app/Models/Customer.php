<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['company', 'address', 'phone_number', 'description', 'image'];

    public function getTakeImageAttribute()
    {
        return '/storage/' . $this->image;
    }

    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class);
    }
}
