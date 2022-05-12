<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'customer_id', 'description', 'image'];

    public function getTakeImageAttribute()
    {
        return '/storage/' . $this->image;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
